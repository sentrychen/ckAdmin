<?php

namespace backend\controllers;

use Yii;
use backend\models\search\UserDepositSearch;
use backend\models\UserDeposit;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\IndexAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;
/**
 * DepositController implements the CRUD actions for UserDeposit model.
 */
class DepositController extends \yii\web\Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function(){
                    
                        $searchModel = new UserDepositSearch();
                        $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                        return [
                            'dataProvider' => $dataProvider,
                            'searchModel' => $searchModel,
                        ];
                    
                }
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => UserDeposit::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => UserDeposit::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => UserDeposit::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => UserDeposit::className(),
            ],
        ];
    }
}
