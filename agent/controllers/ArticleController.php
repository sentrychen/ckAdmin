<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-23 15:13
 */

namespace agent\controllers;

use yii;
use backend\models\Article;
use backend\models\search\ArticleSearch;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\IndexAction;
use backend\actions\ViewAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;

class ArticleController extends \yii\web\Controller
{

    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::class,
                'data' => function () {
                    $searchModel = new ArticleSearch();
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];
                }
            ],
            'create' => [
                'class' => CreateAction::class,
                'modelClass' => Article::class,
                'scenario' => 'article',
            ],
            'update' => [
                'class' => UpdateAction::class,
                'modelClass' => Article::class,
                'scenario' => 'article',
            ],
            'view-layer' => [
                'class' => ViewAction::class,
                'modelClass' => Article::class,
            ],
            'delete' => [
                'class' => DeleteAction::class,
                'modelClass' => Article::class,
            ],
            'sort' => [
                'class' => SortAction::class,
                'modelClass' => Article::class,
                'scenario' => 'article',
            ],
        ];
    }

}