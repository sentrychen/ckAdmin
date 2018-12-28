<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-03-14 21:07
 */

namespace console\controllers;

use Yii;
use yii\console\ExitCode;
use yii\db\Query;

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
        $end_at = strtotime(date('Y-m-d'));
        $start_at = $end_at - 24 * 3600;
        $sql = "select a.id as user_log_id, a.user_id,a.login_ip as ip,a.deviceid,b.id as relate_log_id,b.user_id as relate_id,b.login_ip as relate_login_ip,b.deviceid as relate_deviceid ";
        $sql .= "from {{%user_login_log}} a,{{%user_login_log}} b";
        $sql .= " where a.created_at > {$start_at} and a.created_at < {$end_at} and b.created_at < {$end_at} ";
        $sql .= " and a.user_id != b.user_id";
        $sql .= " and (a.login_ip = b.login_ip or a.deviceid = b.deviceid)";
        $sql .= " and not exists(select * from {{%user_relate}} c where (c.user_id=a.user_id and c.relate_id = b.user_id) or (c.user_id=b.user_id and c.relate_id = a.user_id))";
        $sql .= " group by a.user_id,b.user_id";


        $rows = Yii::$app->db->createCommand($sql)->queryAll();
        $data = [];
        $keys = [];
        $uids = [];
        $map = [];
        foreach ($rows as $row) {

            if (isset($data[$row['user_id'] . '-' . $row['relate_id']]) || isset($data[$row['relate_id'] . '-' . $row['user_id']])) continue;

            if (isset($row['deviceid']) && $row['deviceid'] == $row['relate_deviceid']) {
                $row['remark'] = '登录设备ID相同';
            } else if (isset($row['ip']) && $row['ip'] == $row['relate_login_ip']) {
                $row['remark'] = '登录IP相同';
            } else {
                continue;
            }

            unset($row['relate_login_ip'], $row['relate_deviceid']);
            $row['created_at'] = $row['updated_at'] = time();
            if (empty($keys)) $keys = array_keys($row);
            $data[$row['user_id'] . '-' . $row['relate_id']] = array_values($row);

            if (!isset($uids[$row['user_id']])) $uids[$row['user_id']] = $row['user_id'];
            if (!isset($uids[$row['relate_id']])) $uids[$row['relate_id']] = $row['relate_id'];

        }
        if (!empty($data)) {
            Yii::$app->db->createCommand()->batchInsert('{{%user_relate}}', $keys, $data)->execute();

            $update_sql = "update {{%user_stat}} a inner join ";
            $update_sql .= " (select b.id, count(*) as nums from {{%user}} b,{{%user_relate}} c ";
            $update_sql .= " where (c.user_id = b.id or c.relate_id = b.id ) and b.id in (" . implode(',', $uids) . ") group by b.id) d";
            $update_sql .= " on d.id = a.user_id set a.relate_number = d.nums";
            echo Yii::$app->db->createCommand($update_sql)->execute();
        }

        ExitCode::OK;
    }
}