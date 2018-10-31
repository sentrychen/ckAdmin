<?php

namespace backend\controllers;

use Yii;
use backend\models\search\AgentAccountRecordSearch;
use backend\models\AgentAccountRecord;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\IndexAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;
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
                'data' => function(){
                    
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
