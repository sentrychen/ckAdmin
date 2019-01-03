<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-23 17:51
 */

/**
 * @var $this yii\web\View
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $searchModel backend\models\search\AgentSearch
 */

use common\grid\DateColumn;
use common\grid\GridView;

use agent\models\Agent;
use common\widgets\Bar;
use common\grid\ActionColumn;
use yii\helpers\Html;
use common\helpers\Util;
use yii\helpers\Url;

$this->title = '代理列表';
$this->params['breadcrumbs'][] = '代理列表';

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
                    'showFooter' => true,
                    'footerRowOptions' => ['style' => 'font-weight:bold;'],
                    'columns' => [

                        [
                            'attribute' => 'username',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Html::a($model->username, Url::to(['agent/view', 'id' => $model->id]), [
                                    'title' => $model->username,
                                    'data-pjax' => '0',
                                    'class' => 'openContab',
                                ]);
                            },
                            'footer' => '合计'
                        ],
                        [
                            'attribute' => 'parent.username',
                            'label' => '上级代理',
                            'format' => 'raw',
                            'value' => function ($model) {
                                if (!$model->parent) return '';
                                return Html::a($model->parent->username, Url::to(['agent/view', 'id' => $model->parent->id]), [
                                    'title' => $model->parent->username,
                                    'data-pjax' => '0',
                                    'class' => 'openContab',
                                ]);
                            }
                        ],
                        [
                            'attribute' => 'agent_level',
                            'format' => 'raw',
                            'value' => function ($model) {
                                $class = ['danger', 'danger', 'warning', 'info'];
                                return '<span class="badge label-' . ($class[$model->agent_level] ?? 'info') . '">' . $model->agent_level . '</span>';
                            }
                        ],
                        [
                            'attribute' => 'member',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Html::a(Agent::getMemberCount($model->id), Url::to(['/user/index?UserSearch[invite_agent_id]=' . $model->id]), [
                                    'title' => '查看会员',
                                    'data-pjax' => '0',
                                    'class' => 'openContab',
                                ]);
                            },

                        ],
                        [
                            'attribute' => 'realname',
                        ],
                        [
                            'attribute' => 'promo_code',
                        ],
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                $status = Agent::getStatuses();
                                return isset($status[$model->status]) ? $status[$model->status] : "异常";
                            },
                        ],
                        [
                            'class' => DateColumn::class,
                            'attribute' => 'created_at',

                        ],
                        [
                            'attribute' => 'rebate_plan_id',
                            'label' => '返佣方案',
                            'format' => 'raw',
                            'value' => function ($model) {
                                if ($model->rebate_plan_id) {
                                    return Html::a($model->rebatePlan->name, Url::to(['rebate-plan/view', 'id' => $model->rebate_plan_id]), [
                                        'title' => '查看返佣方案',
                                        'data-pjax' => '0',
                                        'class' => 'openContab'
                                    ]);
                                }
                                return '';
                            }
                        ],
                        [
                            'attribute' => 'xima_plan_id',
                            'label' => '洗码方案',
                            'format' => 'raw',
                            'value' => function ($model) {
                                if ($model->xima_plan_id) {
                                    return Html::a($model->ximaPlan->name, Url::to(['xima-plan/agent-view', 'id' => $model->xima_plan_id]), [
                                        'title' => '查看洗码方案',
                                        'data-pjax' => '0',
                                        'class' => 'openContab'
                                    ]);
                                }
                                return '';
                            }
                        ],

                        [
                            'attribute' => 'account.available_amount',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Util::formatMoney($model->account->available_amount, false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['account_available_amount'], false) . '</span>'

                        ],
                        [
                            'attribute' => 'account.total_amount',
                            'format' => 'raw',
                            'value' => function ($model) {
                                if ($model->account)
                                    return Util::formatMoney($model->account->total_amount, false);
                                else
                                    return '-';
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['account_total_amount'], false) . '</span>'
                        ],


                        [
                            'attribute' => 'account.bet_amount',
                            'format' => 'raw',
                            'value' => function ($model) {
                                if ($model->account)
                                    return Util::formatMoney($model->account->bet_amount, false);
                                else
                                    return '-';
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['account_bet_amount'], false) . '</span>'
                        ],
                        [
                            'class' => ActionColumn::class,
                            'width' => '100',
                            'template' => '{view} {update}',
                            'buttons' => [
                                'update' => function ($url, $model, $key, $index, $gridView) {
                                    if ($model->parent_id == yii::$app->getUser()->getId())
                                        return Html::a('<i class="fa fa-pencil"></i> ' . Yii::t('app', 'Update'), $url, [
                                            'title' => Yii::t('app', 'Update'),
                                            'data-pjax' => '0',
                                            'class' => 'btn btn-primary btn-sm',
                                        ]);
                                    else
                                        return '';
                                },
                            ],
                        ],
                    ]
                ]); ?>
            </div>
        </div>
    </div>
</div>