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
class XimaController extends Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                /*
                'data' => function () {

                    $searchModel = new AgentXimaRecordSearch();
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];
                }*/
                'data' => $this->_getGridViewData(AgentXimaRecordSearch::class,
                    ['bet_amount', 'profit','xima_amount','sub_xima_amount']
                )
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => Rebate::className(),
            ],
        ];
    }
}
