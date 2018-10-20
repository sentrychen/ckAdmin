<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-12-03 21:58
 */

namespace agent\controllers;

use backend\actions\ViewAction;
use yii;
use backend\actions\IndexAction;
use backend\actions\SortAction;
use backend\models\form\BannerTypeForm;
use backend\actions\CreateAction;
use backend\actions\DeleteAction;
use backend\actions\UpdateAction;
use backend\models\form\BannerForm;
use common\models\Options;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;

class BannerController extends \yii\web\Controller
{

    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::class,
                'data' => function () {
                    $dataProvider = new ActiveDataProvider([
                        'query' => BannerTypeForm::find()->where(['type' => Options::TYPE_BANNER]),
                    ]);
                    return [
                        'dataProvider' => $dataProvider,
                    ];
                }
            ],
            'create' => [
                'class' => CreateAction::class,
                'modelClass' => BannerTypeForm::class,
            ],
            'update' => [
                'class' => UpdateAction::class,
                'modelClass' => BannerTypeForm::class,
            ],
            'delete' => [
                'class' => DeleteAction::class,
                'modelClass' => BannerTypeForm::class,
            ],

            'banners' => [
                'class' => IndexAction::class,
                'data' => function () {
                    $id = yii::$app->getRequest()->get('id', null);
                    $form = new BannerForm();
                    $banners = $form->getBanners($id);
                    $dataProvider = new ArrayDataProvider([
                        'allModels' => $banners,
                    ]);
                    return [
                        'dataProvider' => $dataProvider,
                        'bannerType' => BannerTypeForm::findOne($id),
                    ];
                }
            ],
            'banner-create' => [
                'class' => UpdateAction::class,
                'modelClass' => BannerForm::class,
            ],
            'banner-view-layer' => [
                'class' => ViewAction::class,
                'modelClass' => BannerForm::class,
                'viewFile' => 'view',
            ],
            'banner-update' => [
                'class' => UpdateAction::class,
                'modelClass' => BannerForm::class,
            ],
            'banner-sort' => [
                'class' => SortAction::class,
                'modelClass' => BannerForm::class,
            ],
            'banner-delete' => [
                'class' => DeleteAction::class,
                'modelClass' => BannerForm::class,
                'paramSign' => 'sign',
                'scenario' => 'delete',
            ],
        ];
    }
}