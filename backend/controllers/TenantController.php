<?php

namespace backend\controllers;

use Yii;
use backend\models\search\TenantSearch;
use common\models\Tenant;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\IndexAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;

/**
 * TenantController implements the CRUD actions for Tenant model.
 */
class TenantController extends \yii\web\Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function () {

                    $searchModel = new Tenant();
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];

                }
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => Tenant::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => Tenant::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Tenant::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => Tenant::className(),
            ],
        ];
    }
}
