<?php

namespace backend\controllers;

use backend\models\BetList;
use backend\models\PlatformAccountRecord;
use backend\models\search\AgentAccountRecordSearch;
use backend\models\search\AgentXimaRecordSearch;
use backend\models\search\BetListSearch;
use backend\models\search\ChangeAmountRecordSearch;
use backend\models\search\PlatformAccountRecordSearch;
use backend\models\search\RebateSearch;
use backend\models\search\SystemAccountRecordSearch;
use backend\models\search\UserAccountRecordSearch;
use backend\models\search\UserXimaRecordSearch;
use Yii;

class ReportController extends Controller
{

    public function actionAgentTrade()
    {
        return $this->render('agent-trade',$this->_getGridViewData(AgentAccountRecordSearch::class,[
            'amount','after_amount'
    ]));
    }


    public function actionBet()
    {

        return $this->render('bet', $this->_getGridViewData(BetListSearch::class,[
            'period_boot','bet_amount','profit','amount_before','amount_after','xima'
        ]));
    }

    public function actionPlatformTrade()
    {
        return $this->render('platform-trade', $this->_getGridViewData(PlatformAccountRecordSearch::class,[
            'amount','after_amount'
        ]));
    }

    public function actionRebate()
    {
        return $this->render('rebate',$this->_getGridViewData(RebateSearch::class,[
            'self_bet_amount','self_profit_loss','sub_bet_amount','sub_profit_loss','sub_rebate_amount','self_rebate_amount','total_rebate_amount'
        ]));
    }

    public function actionSystemTrade()
    {
        return $this->render('system-trade',$this->_getGridViewData(SystemAccountRecordSearch::class,[
            'amount','after_amount'
        ]));
    }

    public function actionUpdown()
    {
        return $this->render('updown', $this->_getGridViewData(ChangeAmountRecordSearch::class,[

        ]));
    }

    public function actionUserTrade()
    {
        return $this->render('user-trade', $this->_getGridViewData(UserAccountRecordSearch::class,[
            'amount','after_amount'
        ]));
    }

    public function actionUserXima()
    {
        return $this->render('user-xima', $this->_getGridViewData(UserXimaRecordSearch::class,[
            'bet_amount','profit','xima_amount'
        ]));
    }

    public function actionAgentXima()
    {
        return $this->render('agent-xima', $this->_getGridViewData(AgentXimaRecordSearch::class,[
            'bet_amount','profit','xima_amount','sub_xima_amount'
        ]));
    }

}
