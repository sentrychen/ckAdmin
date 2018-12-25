<?php

use backend\models\TwoBarCode;
use common\grid\ActionColumn;
use common\grid\CheckboxColumn;
use common\grid\GridView;
use common\widgets\Bar;
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CompanyBankSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '二维码管理';
$this->params['breadcrumbs'][] = '二维码管理';
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <div class="toolbar clearfix">
                    <?= Bar::widget([
                        'template' => '{refresh} {create} ',
                    ]) ?>
                    <?= $this->render('_search', ['model' => $searchModel]); ?>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'columns' => [
                        ['class' => CheckboxColumn::className()],

                        'id',
                        'name',
                        //'url',
                        [
                            'attribute' => 'icon',
                            'format'=>'raw',
                            'value' => function ($model) {
                                if($model->icon)
                                    return "<img style='max-width:110px;max-height:110px' src='" . $model->icon. "' >";
                            }
                        ],
                        'deposit_min',
                        'deposit_max',
                        'withdraw_min',
                        'withdraw_max',
                        [
                            'attribute' => 'code_type',
                            'value' => function ($model) {

                                return TwoBarCode::getCodeType($model->code_type);
                            }
                        ],
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {

                                return TwoBarCode::getStatuses($model->status);
                            }
                        ],
                        [
                            'class' => ActionColumn::class,
                            'width' => '100',
                            'buttons' => [
                                'delete-barcode' => function ($url, $model, $key) {
                                    return Html::a('<i class="glyphicon glyphicon-trash"></i> 删除', Url::to(['delete-barcode','id'=>$model->id]), [
                                        'title' => '删除',
                                        'data-pjax' => '0',
                                        'class' => 'btn btn-danger btn-sm',
                                    ]);
                                },
                            ],
                            'template' => '{view-layer} {update}{delete-barcode}',
                        ],
                    ],

                ]); ?>
            </div>
        </div>
    </div>
</div>
