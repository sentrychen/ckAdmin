<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-04-02 10:02
 */

namespace backend\controllers;

use backend\actions\ViewAction;
use yii;
use backend\models\Agent;
use backend\models\search\AgentSearch;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\IndexAction;
use backend\actions\SortAction;

class AgentController extends Controller
{

    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::class,
                /*
                'data' => function () {
                    $searchModel = new AgentSearch();
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];
                }
                */
                'data' =>$this->_getGridViewData(AgentSearch::class,[
                    'account.xima_amount','account.available_amount'
                ]) ,
            ],

            'view-layer' => [
                'class' => ViewAction::class,
                'modelClass' => Agent::class,
            ],
            'create' => [
                'class' => CreateAction::class,
                'modelClass' => Agent::class,
                'scenario' => 'create',
            ],
            'update' => [
                'class' => UpdateAction::class,
                'modelClass' => Agent::class,
                'scenario' => 'update',
            ],

            'sort' => [
                'class' => SortAction::class,
                'modelClass' => Agent::class,
            ],
        ];
    }
}