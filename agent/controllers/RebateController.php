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
class RebateController extends Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                /*
                'data' => function () {

                    $searchModel = new RebateSearch();
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];
                }
                */
                'data' => $this->_getGridViewData(RebateSearch::class,
                    ['self_bet_amount', 'self_profit_loss', 'sub_bet_amount', 'sub_profit_loss', 'sub_rebate_amount', 'self_rebate_amount', 'total_rebate_amount', 'xima_amount']
                )

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
