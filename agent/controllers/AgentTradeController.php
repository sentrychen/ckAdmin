<?php

namespace agent\controllers;

use Yii;
use agent\models\search\AgentAccountRecordSearch;
use agent\models\AgentAccountRecord;
use agent\actions\CreateAction;
use agent\actions\UpdateAction;
use agent\actions\IndexAction;
use agent\actions\DeleteAction;
use agent\actions\SortAction;

/**
 * AgentTradeController implements the CRUD actions for AgentAccountRecord model.
 */
class AgentTradeController extends \yii\web\Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function () {

                    $searchModel = new AgentAccountRecordSearch();
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];

                }
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => AgentAccountRecord::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => AgentAccountRecord::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => AgentAccountRecord::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => AgentAccountRecord::className(),
            ],
        ];
    }
}
