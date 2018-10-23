<?php

namespace backend\controllers;

use Yii;
use backend\models\search\CompanyBankSearch;
use backend\models\CompanyBank;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\IndexAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;
/**
 * BankController implements the CRUD actions for CompanyBank model.
 */
class BankController extends \yii\web\Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function(){
                    
                        $searchModel = new CompanyBankSearch();
                        $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                        return [
                            'dataProvider' => $dataProvider,
                            'searchModel' => $searchModel,
                        ];
                    
                }
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => CompanyBank::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => CompanyBank::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => CompanyBank::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => CompanyBank::className(),
            ],
        ];
    }
}
