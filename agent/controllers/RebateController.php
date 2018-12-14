<?php

namespace agent\controllers;

use agent\actions\ViewAction;
use Yii;
use agent\models\search\RebateSearch;
use agent\models\Rebate;
use agent\actions\IndexAction;
use agent\actions\SortAction;

/**
 * RebateController implements the CRUD actions for Rebate model.
 */
class RebateController extends \yii\web\Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function () {

                    $searchModel = new RebateSearch();
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];

                }
            ],
            'view-layer' => [
                'class' => ViewAction::className(),
                'modelClass' => Rebate::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => Rebate::className(),
            ],
        ];
    }

    /**
     * 洗码统计
     */
    public function actionStat()
    {


    }
}
