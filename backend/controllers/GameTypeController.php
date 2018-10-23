<?php

namespace backend\controllers;

use Yii;
use backend\models\search\GameTypeSearch;
use backend\models\GameType;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\IndexAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;
/**
 * GameTypeController implements the CRUD actions for GameType model.
 */
class GameTypeController extends \yii\web\Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function(){
                    
                        $searchModel = new GameTypeSearch();
                        $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                        return [
                            'dataProvider' => $dataProvider,
                            'searchModel' => $searchModel,
                        ];
                    
                }
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => GameType::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => GameType::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => GameType::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => GameType::className(),
            ],
        ];
    }
}
