<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-03-14 21:07
 */

namespace console\controllers;

use common\models\UserLoginLog;
use common\models\UserRelate;
use Yii;
use yii\console\ExitCode;

set_time_limit(0);

/**
 * File attach management
 */
class RelateController extends \yii\console\Controller
{

    /**
     * 统计关联用户
     */
    public function actionStat()
    {
        $start_id = (int)Yii::$app->cache->get('max_login_log_id');
        $max_id = UserLoginLog::find()->max('id');
        Yii::$app->cache->set('max_login_log_id', $max_id);

        $sql = "select min(id) as user_log_id,user_id,login_ip,deviceid from {{%user_login_log}} where id > $start_id group by login_ip,deviceid,user_id";

        $rows = Yii::$app->db->createCommand($sql)->queryAll();
        $data = [];
        $keys = [];
        $uids = [];
        $map = [];
        foreach ($rows as $row) {

            $sql = "select id,user_id,login_ip,deviceid from {{%user_login_log}} where login_ip = {$row['login_ip']} and user_id != {$row['user_id']} ";
            if (!empty($row['deviceid'])) {
                $sql .= " union all ";
                $sql .= "select id,user_id,login_ip,deviceid from {{%user_login_log}} where deviceid = '{$row['deviceid']}' and user_id != {$row['user_id']} ";
            }

            $rows2 = Yii::$app->db->createCommand($sql)->queryAll();
            foreach ($rows2 as $row2) {
                if (isset($map[$row2['user_id'] . '-' . $row['user_id']]) || isset($map[$row['user_id'] . '-' . $row2['user_id']])) continue;

                if (UserRelate::findOne(['user_id' => $row2['user_id'], 'relate_id' => $row['user_id']])) continue;
                if (UserRelate::findOne(['user_id' => $row['user_id'], 'relate_id' => $row2['user_id']])) continue;


                if (!empty($row2['deviceid']) && $row2['deviceid'] == $row['deviceid']) {
                    $row['remark'] = '登录设备ID相同';
                } else if ($row2['login_ip'] == $row['login_ip']) {
                    $row['remark'] = '登录IP相同';
                } else {
                    continue;
                }
                $row3 = $row;
                $row3['relate_id'] = $row2['user_id'];
                $row3['relate_log_id'] = $row2['id'];
                $row3['ip'] = long2ip($row['login_ip']);
                $row3['created_at'] = $row3['updated_at'] = time();
                unset($row3['login_ip']);

                if (empty($keys)) $keys = array_keys($row3);
                $map[$row3['user_id'] . '-' . $row3['relate_id']] = 1;
                $data[] = array_values($row3);
                if (!isset($uids[$row3['user_id']])) $uids[$row3['user_id']] = $row3['user_id'];
                if (!isset($uids[$row3['relate_id']])) $uids[$row3['relate_id']] = $row3['relate_id'];
                if (count($data) > 99) {
                    Yii::$app->db->createCommand()->batchInsert('{{%user_relate}}', $keys, $data)->execute();
                    $data = [];
                }
            }

        }

        if (!empty($uids)) {
            if (!empty($data)) {
                Yii::$app->db->createCommand()->batchInsert('{{%user_relate}}', $keys, $data)->execute();
            }

            $update_sql = "update {{%user_stat}} a inner join ";
            $update_sql .= " (select b.id, count(*) as nums from {{%user}} b,{{%user_relate}} c ";
            $update_sql .= " where b.id in (" . implode(',', $uids) . ") and (c.user_id = b.id or c.relate_id = b.id ) group by b.id) d";
            $update_sql .= " on d.id = a.user_id set a.relate_number = d.nums";
            Yii::$app->db->createCommand($update_sql)->execute();
        }

        ExitCode::OK;
    }
}