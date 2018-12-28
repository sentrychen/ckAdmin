<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-03-14 21:07
 */

namespace console\controllers;


use common\models\Rebate;
use Yii;
use yii\console\ExitCode;

set_time_limit(0);

/**
 * File attach management
 */
class RebateController extends \yii\console\Controller
{

    /**
     *计算返佣值，计算上个月返佣值
     */
    public function actionCalculate()
    {
        $start_at = strtotime(date('Y-m-01', strtotime('-1 month')));
        $end_at = strtotime(date('Y-m-01'));
        $ym = date('Ym', $start_at);
        //如果记录已经存在，先删除
        Rebate::deleteAll(['ym' => $ym]);

        $sql = 'select u.invite_agent_id,b.platform_id,sum(b.profit) as profit,sum(b.bet_amount) bet_amount,sum(DISTINCT b.user_id) as user_num from ck_bet_list b, ck_user u ';
        $sql .= "  where b.user_id=u.id and b.state = 1 and b.bet_at >= {$start_at} and b.bet_at < {$end_at}  group by u.invite_agent_id,b.platform_id having sum(b.profit) < 0";
        $rows = Yii::$app->getDb()->createCommand($sql)->queryAll();
        $models = [];
        foreach ($rows as $row) {
            $rebate = Rebate::findOne(['agent_id' => $row['invite_agent_id'], 'ym' => $ym]);
            if (!isset($models[$row['platform_id']][$row['invite_agent_id']]))
                $models[$row['platform_id']][$row['invite_agent_id']] = new Rebate(['agent_id' => $row['invite_agent_id'], 'platform_id' => $row['platform_id'], 'ym' => $ym]);
            $models[$row['platform_id']][$row['invite_agent_id']]->calProfit(abs($row['profit']), $row['bet_amount'], $row['user_num'], $models);
        }

        foreach ($models as $platforms) {
            foreach ($platforms as $model)
                $model->calRebate($models);
        }

        foreach ($models as $platforms) {
            foreach ($platforms as $model) {
                if ($model->rebate_rate >0){
                    $model->total_rebate_amount = $model->self_rebate_amount + $model->sub_rebate_amount;
                    if ($model->rebate_limit > 0 && $model->total_rebate_amount > $model->rebate_limit){
                        $model->total_rebate_amount = $model->rebate_limit;
                    }
                    $model->save(false);
                }
            }

        }

        ExitCode::OK;
    }
}