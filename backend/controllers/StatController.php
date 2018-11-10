<?php

namespace backend\controllers;

use backend\models\search\AgentDailySearch;
use backend\models\search\DailySearch;
use backend\models\search\PlatformDailySearch;
use backend\models\search\UserDepositSearch;
use Yii;

class StatController extends \yii\web\Controller
{
    public function actionAgent()
    {
        $searchModel = new AgentDailySearch();
        $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());

        return $this->render('agent', ['dataProvider' => $dataProvider, 'searchModel' => $searchModel]);
    }

    public function actionPlatform()
    {
        $searchModel = new PlatformDailySearch();
        $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());

        return $this->render('platform', ['dataProvider' => $dataProvider, 'searchModel' => $searchModel]);
    }

    public function actionDaily()
    {
        $searchModel = new DailySearch();
        $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());

        return $this->render('daily', ['dataProvider' => $dataProvider, 'searchModel' => $searchModel]);
    }

}
