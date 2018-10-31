<?php

namespace backend\controllers;

use backend\actions\ViewAction;
use Yii;
use backend\models\search\RebateSearch;
use backend\models\Rebate;
use backend\actions\IndexAction;
use backend\actions\SortAction;
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
                'data' => function(){
                    
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
}
