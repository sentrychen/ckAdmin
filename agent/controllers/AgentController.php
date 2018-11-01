<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-04-02 10:02
 */

namespace agent\controllers;

use agent\actions\ViewAction;
use yii;
use agent\models\Agent;
use agent\models\search\AgentSearch;
use agent\actions\CreateAction;
use agent\actions\UpdateAction;
use agent\actions\IndexAction;
use agent\actions\SortAction;

class AgentController extends Controller
{

    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::class,
                'data' => function () {
                    $searchModel = new AgentSearch();
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];
                }
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