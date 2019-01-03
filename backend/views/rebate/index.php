<?php

use common\widgets\Bar;
use common\grid\CheckboxColumn;
use common\grid\ActionColumn;
use common\grid\GridView;
use common\grid\DateColumn;
use common\helpers\Util;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\RebateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '代理佣金';
$this->params['breadcrumbs'][] = '代理佣金';
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <div class="toolbar clearfix">

                    <?= $this->render('_search', ['model' => $searchModel]); ?>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'showFooter' => true,
                    'footerRowOptions' => ['style' => 'font-weight:bold;'],
                    'columns' => [
                        [
                            'attribute' => 'ym',
                            'footer' => '合计'
                        ],
                        [
                            'attribute' => 'agent.username',
                            'label' => '代理',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Html::a($model->agent->username, Url::to(['agent/view', 'id' => $model->agent->id]), [
                                    'title' => $model->agent->username,
                                    'data-pjax' => '0',
                                    'class' => 'openContab',
                                ]);
                            }
                        ],
                        [
                            'attribute' => 'platform.name',
                            'label' => '平台',
                        ],
                        [
                            'attribute' => 'self_bet_user_num',

                            'footer' => '<span class="label label-default">' . $totals['self_bet_user_num'] . '</span>'
                        ],
                        [
                            'attribute' => 'self_profit_loss',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Util::formatMoney($model->self_profit_loss, false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['self_profit_loss'], false) . '</span>'
                        ],
                        [
                            'attribute' => 'sub_bet_user_num',

                            'footer' => '<span class="label label-default">' . $totals['sub_bet_user_num'] . '</span>'
                        ],
                        [
                            'attribute' => 'sub_profit_loss',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Util::formatMoney($model->sub_profit_loss, false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['sub_profit_loss'], false) . '</span>'
                        ],
                        [
                            'attribute' => 'sub_rebate_amount',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Util::formatMoney($model->sub_rebate_amount, false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['sub_rebate_amount'], false) . '</span>'
                        ],
                        [
                            'attribute' => 'self_rebate_amount',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Util::formatMoney($model->self_rebate_amount, false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['self_rebate_amount'], false) . '</span>'
                        ],
                        [
                            'attribute' => 'rebate_limit',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Util::formatMoney($model->rebate_limit, false);
                            },
                        ],
                        [
                            'attribute' => 'rebate_rate',
                            'format' => 'raw',
                            'value' => function ($model) {
                                if ($model->rebate_plan_id) {
                                    return Html::a(Yii::$app->formatter->asPercent($model->rebate_rate, 2), Url::to(['rebate-plan/view', 'id' => $model->rebate_plan_id]), [
                                        'title' => $model->rebatePlan->name,
                                        'data-pjax' => '0',
                                        'class' => 'openContab'
                                    ]);
                                }
                                return Yii::$app->formatter->asPercent($model->rebate_rate, 2);
                            }
                        ],
                        [
                            'attribute' => 'total_rebate_amount',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Util::formatMoney($model->total_rebate_amount, false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['total_rebate_amount'], false) . '</span>'
                        ],
                        [
                            'class' => DateColumn::class,
                            'attribute' => 'created_at'
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
