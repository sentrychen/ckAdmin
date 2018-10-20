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
use backend\models\search\FriendlyLinkSearch;
use backend\models\FriendlyLink;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\IndexAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;

/**
 * FriendLink controller
 */
class FriendlyLinkController extends \yii\web\Controller
{

    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::class,
                'data' => function () {
                    $searchModel = new FriendlyLinkSearch();
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];
                }
            ],
            'create' => [
                'class' => CreateAction::class,
                'modelClass' => FriendlyLink::class,
            ],
            'update' => [
                'class' => UpdateAction::class,
                'modelClass' => FriendlyLink::class,
            ],
            'delete' => [
                'class' => DeleteAction::class,
                'modelClass' => FriendlyLink::class,
            ],
            'sort' => [
                'class' => SortAction::class,
                'modelClass' => FriendlyLink::class,
            ],
            'view-layer' => [
                'class' => ViewAction::class,
                'modelClass' => FriendlyLink::class,
            ],
        ];
    }

}
