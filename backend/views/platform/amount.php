<?php

use backend\models\Platform;
use common\widgets\Bar;
use common\grid\ActionColumn;
use common\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use common\helpers\Util;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PlatformSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '游戏平台管理';
$this->params['breadcrumbs'][] = '游戏平台管理';
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <div class="toolbar clearfix">
                    <?= Bar::widget([
                        'template' => '{refresh} {list} ',
                        'buttons' => [
                            'list' => function () {
                                return Html::a('<i class="fa fa-file-text-o"></i> 交易记录', Url::to(['report/platform-trade']), [
                                    'title' => '交易记录',
                                    'data-pjax' => '0',
                                    'class' => 'btn btn-white btn-sm openContab',
                                ]);
                            },
                        ]
                    ]) ?>
                    <?= $this->render('_search', ['model' => $searchModel]); ?>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'showFooter' => true,
                    'footerRowOptions' => ['style' => 'font-weight:bold;'],
                    'columns' => [
                        ['attribute' =>'name','footer' => '合计'],
                        'code',
                        [
                            'attribute' => 'account.available_amount',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Util::formatMoney($model->account->available_amount, false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['account_available_amount'], false) . '</span>'
                        ],
                        [
                            'attribute' => 'account.frozen_amount',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Util::formatMoney($model->account->frozen_amount, false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['account_frozen_amount'], false) . '</span>'
                        ],
                        [
                            'attribute' => 'account.alarm_amount',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Util::formatMoney($model->account->alarm_amount, false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['account_alarm_amount'], false) . '</span>'
                        ],
                        [
                            'attribute' => 'status',
                            'format' => 'raw',
                            'value' => function ($model) {
                                $status = Platform::getStatuses();
                                return '<span class="label label-' . ($model->status == Platform::STATUS_ENABLED ? 'primary' : 'danger') . '">' . (isset($status[$model->status]) ? $status[$model->status] : "异常") . '</span>';
                            }
                        ],
                        ['class' => ActionColumn::className(),
                            'template' => '{change-amount} {alarm-amount}',
                            'buttons' => [
                                'change-amount' => function ($url, $model, $key) {
                                    return Html::a('<i class="fa fa-credit-card"></i> 额度调整', Url::to(['change-amount', 'platform_id' => $model->id]), [
                                        'title' => '平台额度调整',
                                        'data-pjax' => '0',
                                        'class' => 'btn btn-warning btn-sm',
                                    ]);
                                },
                                'alarm-amount' => function ($url, $model, $key) {
                                    return Html::a('<i class="fa fa-warning"></i> 告警设置', Url::to(['alarm-amount', 'platform_id' => $model->id]), [
                                        'title' => '平台资金告警额度设置',
                                        'data-pjax' => '0',
                                        'class' => 'btn btn-danger btn-sm',
                                    ]);
                                },

                            ]
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
