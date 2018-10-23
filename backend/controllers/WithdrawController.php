<?php

namespace backend\controllers;

use Yii;
use backend\models\search\UserWithdrawSearch;
use backend\models\UserWithdraw;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\IndexAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;
/**
 * WithdrawController implements the CRUD actions for UserWithdraw model.
 */
class WithdrawController extends \yii\web\Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function(){
                    
                        $searchModel = new UserWithdrawSearch();
                        $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                        return [
                            'dataProvider' => $dataProvider,
                            'searchModel' => $searchModel,
                        ];
                    
                }
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => UserWithdraw::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => UserWithdraw::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => UserWithdraw::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => UserWithdraw::className(),
            ],
        ];
    }
}
