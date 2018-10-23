<?php

namespace backend\controllers;

use Yii;
use backend\models\search\MessageSearch;
use backend\models\Message;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\IndexAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;
/**
 * MessageController implements the CRUD actions for Message model.
 */
class MessageController extends \yii\web\Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function(){
                    
                        $searchModel = new MessageSearch();
                        $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                        return [
                            'dataProvider' => $dataProvider,
                            'searchModel' => $searchModel,
                        ];
                    
                }
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => Message::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => Message::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Message::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => Message::className(),
            ],
        ];
    }
}
