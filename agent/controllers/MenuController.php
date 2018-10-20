<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-03-15 21:16
 */

namespace agent\controllers;

use backend\actions\ViewAction;
use yii;
use backend\models\Menu;
use backend\models\search\MenuSearch;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\IndexAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;

/**
 * Menu controller
 */
class MenuController extends \yii\web\Controller
{

    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::class,
                'data' => function () {
                    $searchModel = new MenuSearch(['scenario' => 'backend']);
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    $data = [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];
                    return $data;
                }
            ],
            'view-layer' => [
                'class' => ViewAction::class,
                'modelClass' => Menu::class,
                'scenario' => 'backend',
            ],
            'create' => [
                'class' => CreateAction::class,
                'modelClass' => Menu::class,
                'scenario' => 'backend',
            ],
            'update' => [
                'class' => UpdateAction::class,
                'modelClass' => Menu::class,
                'scenario' => 'backend',
            ],
            'delete' => [
                'class' => DeleteAction::class,
                'modelClass' => Menu::class,
            ],
            'sort' => [
                'class' => SortAction::class,
                'modelClass' => Menu::class,
                'scenario' => 'backend',
            ],
        ];
    }

}
