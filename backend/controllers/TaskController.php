<?php

namespace backend\controllers;

use Yii;
use backend\models\search\TaskSearch;
use backend\models\Task;
use backend\actions\ViewAction;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\IndexAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;
/**
 * TaskController implements the CRUD actions for Task model.
 */
class TaskController extends \yii\web\Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function(){
                    
                        $searchModel = new TaskSearch();
                        $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                        return [
                            'dataProvider' => $dataProvider,
                            'searchModel' => $searchModel,
                        ];
                    
                }
            ],
            'view-layer' => [
                'class' => ViewAction::className(),
                'modelClass' => Task::className(),
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => Task::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => Task::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Task::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => Task::className(),
            ],
        ];
    }
}
