<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-03-14 21:07
 */

namespace console\controllers;


use common\models\AgentAccount;
use common\models\AgentAccountRecord;
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

        $sql = 'select u.invite_agent_id,b.platform_id,sum(b.profit) as profit,sum(b.bet_amount) bet_amount,count(DISTINCT b.user_id) as user_num from {{%bet_list}} b, {{%user}} u ';
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
                    if ($model->agent && $model->agent->account) {
                        //洗码值结算
                        $amount = $model->total_rebate_amount > $model->agent->account->xima_amount ? $model->total_rebate_amount : $model->agent->account->xima_amount;
                        $model->agent->account->available_amount += $amount;
                        $model->agent->account->total_amount += $amount;
                        $model->agent->account->xima_amount = 0;
                        if ($model->total_rebate_amount <= $model->agent->account->xima_amount) {
                            $model->agent->account->total_xima_amount += $amount;
                            $name = "洗码结算";
                            $tradeType = AgentAccountRecord::TRADE_TYPE_XIMA;
                        } else {
                            $name = "返佣结算";
                            $tradeType = AgentAccountRecord::TRADE_TYPE_REBATE;
                        }
                        if ($model->agent->account->save(false)) {
                            $agentAccountRecord = new AgentAccountRecord();
                            $agentAccountRecord->agent_id = $model->agent_id;
                            $agentAccountRecord->amount = $amount;
                            $agentAccountRecord->name = $name;
                            $agentAccountRecord->remark = $name . '收入。返佣：' . $model->total_rebate_amount . ',洗码：' . $model->agent->account->xima_amount;
                            $agentAccountRecord->switch = AgentAccountRecord::SWITCH_IN;
                            $agentAccountRecord->trade_no = $model->id;
                            $agentAccountRecord->trade_type_id = $tradeType;
                            $agentAccountRecord->after_amount = $model->agent->account->available_amount;
                            $agentAccountRecord->save(false);

                        }
                    }
                    $model->save(false);
                }
            }
        }

        $accounts = AgentAccount::find()->where(['>', 'xima_amount', 0])->all();

        /**
         * @var $model AgentAccount
         */
        foreach ($accounts as $model) {
            $ximaAmount = $model->xima_amount;
            $model->available_amount += (float)$ximaAmount;
            $model->total_xima_amount += (float)$ximaAmount;
            $model->xima_amount = 0;

            if ($model->save(false)) {
                $userRecord = new AgentAccountRecord();
                $userRecord->agent_id = $model->agent_id;
                $userRecord->switch = AgentAccountRecord::SWITCH_IN;
                $userRecord->trade_no = $model->agent_id;
                $userRecord->trade_type_id = AgentAccountRecord::TRADE_TYPE_XIMA;
                $userRecord->name = '洗码结算';
                $userRecord->remark = '洗码收入结算，当期无返佣收入。';
                $userRecord->amount = $ximaAmount;
                $userRecord->after_amount = $model->available_amount;
                echo $userRecord->save(false);

            }


        }
        ExitCode::OK;
    }
}