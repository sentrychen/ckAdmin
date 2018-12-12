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
        $sql = "select u.invite_agent_id,sum(b.profit) as profit,sum(b.bet_amount) as bet_amount from ck_bet_list b left join ck_user u  
                 on b.user_id=u.id where b.state = 1 and b.bet_at >= {$start_at} and b.bet_at < {$end_at}  group by u.invite_agent_id having sum(b.profit) < 0";
        $rows = Yii::$app->getDb()->createCommand($sql)->queryAll();
        foreach ($rows as $row) {
            $rebate = Rebate::findOne(['agent_id' => $row['invite_agent_id'], 'ym' => $ym]);
            if (!$rebate)
                $rebate = new Rebate(['agent_id' => $row['invite_agent_id'], 'ym' => $ym]);
            $rebate->calRebate(abs($row['profit']), $row['bet_amount']);
        }
        ExitCode::OK;
    }
}