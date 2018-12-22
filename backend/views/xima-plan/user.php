<?php

use common\grid\ActionColumn;
use common\grid\GridView;
use common\libs\Constants;
use common\widgets\Bar;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CompanyBankSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户返佣方案';
$this->params['breadcrumbs'][] = '用户返佣方案';
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <div class="toolbar clearfix">
                    <?= Bar::widget([
                        'template' => '{refresh} {create} ',
                        'buttons' => [
                            'create' => function () {
                                return Html::a('<i class="fa fa-plus"></i> 新增', Url::to(['user-create']), [
                                    'title' => '新增用户返佣方案',
                                    'data-pjax' => '0',
                                    'class' => 'btn btn-primary btn-sm',
                                ]);
                            },
                        ],
                    ])
                    ?>
                    <?= $this->render('_user_search', ['model' => $searchModel]); ?>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'columns' => [
                        'name',
                        [
                            'attribute' => 'is_default',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return $model->is_default ? '<span class="fa fa-check text-success"></span>' : '';
                            }
                        ],
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                return Constants::getStatusItems($model->status);
                            }
                        ],
                        'created_at:date',
                        [
                            'class' => ActionColumn::class,
                            'template' => '{view} {update} {delete}',
                            'buttons' => [
                                'view' => function ($url, $model, $key) {
                                    return Html::a('<i class="fa fa-folder"></i> ' . Yii::t('yii', 'View'), Url::to(['user-view', 'id' => $model->id]), [
                                        'title' => Yii::t('app', 'View'),
                                        'data-pjax' => '0',
                                        'class' => 'btn btn-info btn-sm',
                                    ]);
                                },
                                'update' => function ($url, $model, $key) {
                                    return Html::a('<i class="fa fa-pencil"></i> 编辑', Url::to(['user-update', 'id' => $model->id]), [
                                        'title' => '编辑洗码方案',
                                        'data-pjax' => '0',
                                        'class' => 'btn btn-primary btn-sm',
                                    ]);
                                },
                                'delete' => function ($url, $model, $key) {
                                    return Html::a('<i class="glyphicon glyphicon-trash" aria-hidden="true"></i> ' . Yii::t('app', 'Delete'), Url::to(['user-delete', 'id' => $model->id]), [
                                        'title' => Yii::t('app', 'Delete'),
                                        'data-confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                        'data-method' => 'post',
                                        'data-pjax' => '0',
                                        'class' => 'btn btn-danger btn-sm',
                                    ]);
                                },
                            ],
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
