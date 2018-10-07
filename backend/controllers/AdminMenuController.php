<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-03-15 21:16
 */
namespace backend\controllers;

use backend\actions\ViewAction;
use yii\data\ArrayDataProvider;
use backend\models\Menu;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\IndexAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;

/**
 * FrontendMenu controller
 */
class AdminMenuController extends \yii\web\Controller
{

    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function(){
                    $data = Menu::getMenus(Menu::ADMIN_TYPE);
                    $dataProvider = new ArrayDataProvider([
                        'allModels' => $data,
                        'pagination' => [
                            'pageSize' => -1
                        ]
                    ]);
                    return [
                        'dataProvider' => $dataProvider,
                    ];
                }
            ],
            'view-layer' => [
                'class' => ViewAction::className(),
                'modelClass' => Menu::className(),
                'scenario' => 'admin',
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => Menu::className(),
                'scenario' => 'admin',
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => Menu::className(),
                'scenario' => 'admin',
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Menu::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => Menu::className(),
                'scenario' => 'admin',
            ],
        ];
    }

}
