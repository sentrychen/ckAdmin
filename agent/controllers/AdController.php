<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-12-05 12:47
 */

namespace backend\controllers;

use backend\actions\ViewAction;
use backend\models\form\AdForm;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\IndexAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;
use yii\data\ActiveDataProvider;

class AdController extends \yii\web\Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::class,
                'data' => function () {
                    $dataProvider = new ActiveDataProvider([
                        'query' => AdForm::find()->where(['type' => AdForm::TYPE_AD])->orderBy('sort,id'),
                    ]);
                    return [
                        'dataProvider' => $dataProvider,
                    ];
                }
            ],
            'view-layer' => [
                'class' => ViewAction::class,
                'modelClass' => AdForm::class,
            ],
            'create' => [
                'class' => CreateAction::class,
                'modelClass' => AdForm::class,
            ],
            'update' => [
                'class' => UpdateAction::class,
                'modelClass' => AdForm::class,
            ],
            'delete' => [
                'class' => DeleteAction::class,
                'modelClass' => AdForm::class,
            ],
            'sort' => [
                'class' => SortAction::class,
                'modelClass' => AdForm::class,
            ],
        ];
    }
}