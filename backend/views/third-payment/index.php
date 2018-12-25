<?php

use backend\models\ThirdPayment;
use common\grid\ActionColumn;
use common\grid\CheckboxColumn;
use common\grid\GridView;
use common\widgets\Bar;
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CompanyBankSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '第三方支付列表';
$this->params['breadcrumbs'][] = '第三方支付';
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
                        'code',
                        'deposit_min',
                        'deposit_max',
                        'withdraw_min',
                        'withdraw_max',
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {

                                return ThirdPayment::getStatuses($model->status);
                            }
                        ],
                        [
                            'class' => ActionColumn::class,
                            'width' => '100',
                            'buttons' => [
                                'report' => function ($url, $model, $key) {
                                    return Html::a('<i class="fa fa-table"></i> 报表', Url::to(['/deposit/index?UserDepositSearch[pay_channel]='.ThirdPayment::SAVE_PAYMENT_ID]), [
                                        'title' => '第三方支付报表',
                                        'data-pjax' => '0',
                                        'class' => 'btn btn-info btn-sm openContab',
                                    ]);
                                },
                                'delete-pay' => function ($url, $model, $key) {
                                    return Html::a('<i class="glyphicon glyphicon-trash"></i> 删除', Url::to(['delete-pay','id'=>$model->id]), [
                                        'title' => '删除',
                                        'data-pjax' => '0',
                                        'class' => 'btn btn-danger btn-sm',
                                    ]);
                                },
                            ],
                            'template' => '{report} {view-layer} {update} {delete-pay}',
                        ],
                    ],

                ]); ?>
            </div>
        </div>
    </div>
</div>
