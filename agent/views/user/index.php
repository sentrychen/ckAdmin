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
 * @var $searchModel backend\models\search\UserSearch
 */

use agent\models\User;
use common\grid\ActionColumn;
use common\grid\DateColumn;
use common\grid\GridView;
use common\helpers\Util;
use common\libs\Constants;
use common\widgets\Bar;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = '会员';
$this->params['breadcrumbs'][] = '会员列表';

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
                    'layout' => "{items}\n{pager}",
                    'columns' => [

                        [
                            'attribute' => 'username',
                            'footer' => '合计',
                        ],

                        [
                            'attribute' => 'agent_name',
                            'label' => '所属代理',
                            'format' => 'raw',
                            'value' => function ($model) {
                                if (!$model->inviteAgent) return '';
                                return Html::a($model->inviteAgent->username, Url::to(['agent/view', 'id' => $model->inviteAgent->id]), [
                                    'title' => $model->username,
                                    'data-pjax' => '0',
                                    'class' => 'openContab',
                                ]);
                            }
                        ],
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                $status = User::getStatuses();
                                return isset($status[$model->status]) ? $status[$model->status] : "异常";
                            },
                            'filter' => User::getStatuses(),
                        ],
                        [
                            'class' => DateColumn::class,
                            'attribute' => 'created_at'
                        ],
                        [
                            'class' => DateColumn::class,
                            'attribute' => 'userStat.last_login_at',
                        ],
                        [
                            'attribute' => 'userStat.login_number',
                            'format' => 'integer',
                            'footer' => '<span class="label label-default">' . number_format($totals['userStat_login_number'], 0) . '</span>'
                        ],

                        [
                            'attribute' => 'account.available_amount',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Util::formatMoney(isset($model->account->available_amount) ? $model->account->available_amount : 0, false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['account_available_amount'], false) . '</span>'
                        ],
                        [
                            'attribute' => 'userStat.bet_amount',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Util::formatMoney(isset($model->userStat->bet_amount) ? $model->userStat->bet_amount : 0, false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['userStat_bet_amount'], false) . '</span>'
                        ],
                        [
                            'attribute' => 'xima_plan_id',
                            'label' => '洗码方案',
                            'format' => 'raw',
                            'value' => function ($model) {
                                if ($model->xima_plan_id) {
                                    return Html::a($model->ximaPlan->name, Url::to(['xima-plan/user-view', 'id' => $model->xima_plan_id]), [
                                        'title' => '查看洗码方案',
                                        'data-pjax' => '0',
                                        'class' => 'openContab'
                                    ]);
                                }
                                return '';
                            }
                        ],
                        [
                            'attribute' => 'account.xima_amount',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Util::formatMoney(isset($model->account->xima_amount) ? $model->account->xima_amount : 0, false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['account_available_amount'], false) . '</span>'
                        ],
                        [
                            'attribute' => 'userStat.profit',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Util::formatMoney(isset($model->userStat->profit) ? $model->userStat->profit : 0, false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['userStat_profit'], false) . '</span>'
                        ],
                        [
                            'class' => ActionColumn::class,
                            'template' => yii::$app->option->agent_change_amount == Constants::YesNo_Yes ? '{update} {change-amount}' : '{update}',
                            'width' => 120,
                            'buttons' => [

                                'change-amount' => function ($url, $model, $key) {
                                    if ($model->invite_agent_id == yii::$app->getUser()->getId()) {
                                        return Html::a('<i class="fa fa-credit-card"></i> 上下分', Url::to(['change-amount', 'user_id' => $model->id]), [
                                            'title' => '会员额度调整',
                                            'data-pjax' => '0',
                                            'class' => 'btn btn-warning btn-sm',
                                        ]);
                                    } else
                                        return '';
                                },
                                'update' => function ($url, $model, $key, $index, $gridView) {
                                    if ($model->invite_agent_id == yii::$app->getUser()->getId())
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