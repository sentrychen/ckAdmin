<?php

namespace backend\controllers;

use backend\models\PlatformAccountRecord;
use backend\models\search\AgentAccountRecordSearch;
use backend\models\search\BetListSearch;
use backend\models\search\ChangeAmountRecordSearch;
use backend\models\search\PlatformAccountRecordSearch;
use backend\models\search\RebateSearch;
use backend\models\search\SystemAccountRecordSearch;
use backend\models\search\UserAccountRecordSearch;
use Yii;

class ReportController extends \yii\web\Controller
{

    public function actionAgentTrade()
    {
        return $this->render('agent-trade', $this->_getData(AgentAccountRecordSearch::class));
    }

    /**
     * @param string $modelClass
     * @return array
     */
    private function _getData($modelClass)
    {
        $searchModel = new $modelClass;
        $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
        return [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ];

    }

    public function actionBet()
    {
        return $this->render('bet', $this->_getData(BetListSearch::class));
    }

    public function actionPlatformTrade()
    {
        return $this->render('platform-trade', $this->_getData(PlatformAccountRecordSearch::class));
    }

    public function actionRebate()
    {
        return $this->render('rebate', $this->_getData(RebateSearch::class));
    }

    public function actionSystemTrade()
    {
        return $this->render('system-trade', $this->_getData(SystemAccountRecordSearch::class));
    }

    public function actionUpdown()
    {
        return $this->render('updown', $this->_getData(ChangeAmountRecordSearch::class));
    }

    public function actionUserTrade()
    {
        return $this->render('user-trade', $this->_getData(UserAccountRecordSearch::class));
    }

    public function actionXima()
    {
        return $this->render('xima');
    }

}
