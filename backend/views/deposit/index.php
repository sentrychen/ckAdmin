<?php

use backend\models\UserDeposit;
use common\widgets\Bar;
use common\grid\{
    CheckboxColumn, ActionColumn, DateColumn, GridView
};
use yii\helpers\Html;
use yii\helpers\Url;
use common\helpers\Util;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserDepositSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '会员存款审核';
$this->params['breadcrumbs'][] = '会员存款审核';
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <div class="toolbar clearfix">
                    <?= Bar::widget([
                        'template' => '{refresh}',
                    ]) ?>
                    <?= $this->render('_search', ['model' => $searchModel]); ?>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'columns' => [

                        [
                            'attribute' => 'id',
                        ],
                        [
                            'attribute' => 'user.username',
                        ],
                        [
                            'attribute' => 'apply_amount',
                            'width' => '80',
                            'format' => 'raw',
                            'value' => function($searchModel){
                                return Util::formatMoney($searchModel->apply_amount,false);
                            }
                        ],
                        [
                            'attribute' => 'confirm_amount',
                            'format' => 'raw',
                            'value' => function($searchModel){
                                return Util::formatMoney($searchModel->confirm_amount,false);
                            }
                        ],

                        [
                            'attribute' => 'pay_channel',
                            'value' => function ($model) {
                                return UserDeposit::getPayChannels($model->pay_channel);
                            }
                        ],
                        [
                            'attribute' => 'pay_username',
                        ],
                        [
                            'attribute' => 'pay_info',
                        ],
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                return UserDeposit::getStatuses($model->status);
                            }
                        ],

                        [
                            'attribute' => 'audit_by_username',
                        ],
                        [
                            'attribute' => 'audit_remark',
                        ],
                        [
                            'class' => DateColumn::class,
                            'attribute' => 'audit_at',
                        ],
                        [
                            'class' => DateColumn::class,
                            'attribute' => 'created_at'

                        ],
                        [
                            'class' => ActionColumn::class,
                            'width' => '80',
                            'buttons' => [

                                'audit' => function ($url, $model, $key) {
                                    if ($model->status == UserDeposit::STATUS_UNCHECKED)
                                        return Html::a('<i class="fa fa-check"></i> 审核', Url::to(['audit', 'id' => $model->id]), [
                                            'title' => '存款审核',
                                            'data-pjax' => '0',
                                            'class' => 'btn btn-warning btn-sm',
                                        ]);
                                    else
                                        return "";
                                },

                            ],
                            'template' => '{view-layer} {audit}',
                        ],
                    ]
                ]); ?>
            </div>
        </div>
    </div>
</div>
