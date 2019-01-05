<?php

namespace backend\controllers;

use Yii;
use backend\models\search\PlatformGameSearch;
use backend\models\PlatformGame;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\IndexAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;

/**
 * GameController implements the CRUD actions for PlatformGame model.
 */
class GameController extends Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => $this->_getGridViewData(PlatformGameSearch::class, ['bet_amount', 'profit', 'bet_num', 'bet_user_num'])
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => PlatformGame::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => PlatformGame::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => PlatformGame::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => PlatformGame::className(),
            ],
        ];
    }
}
