<?php

namespace backend\controllers;

use Yii;
use backend\models\search\PlatformSearch;
use backend\models\Platform;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\IndexAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;
/**
 * PlatformController implements the CRUD actions for Platform model.
 */
class PlatformController extends \yii\web\Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function(){
                    
                        $searchModel = new PlatformSearch();
                        $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                        return [
                            'dataProvider' => $dataProvider,
                            'searchModel' => $searchModel,
                        ];
                    
                }
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => Platform::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => Platform::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Platform::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => Platform::className(),
            ],
        ];
    }
}
