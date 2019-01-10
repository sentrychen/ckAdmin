<?php

namespace backend\controllers;

use Yii;
use backend\models\search\TenantSearch;
use backend\models\Tenant;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\IndexAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;

/**
 * TenantController implements the CRUD actions for Tenant model.
 */
class TenantController extends Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => $this->_getGridViewData(TenantSearch::class)
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
