<?php

namespace agent\controllers;


use agent\models\search\AgentXimaRecordSearch;
use Yii;
use agent\models\Rebate;
use agent\actions\IndexAction;
use agent\actions\SortAction;

/**
 * RebateController implements the CRUD actions for Rebate model.
 */
class XimaController extends \yii\web\Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function () {

                    $searchModel = new AgentXimaRecordSearch();
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];

                }
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => Rebate::className(),
            ],
        ];
    }
}
