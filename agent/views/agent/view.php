<?php

use backend\models\Agent;
use common\helpers\Util;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;


$this->title = $model->username;
$this->params['breadcrumbs'] = [
    ['label' => '代理详情', 'url' => Url::to(['agent/index'])],
    ['label' => $model->username],
];
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'username',
                        [
                            'attribute' => 'parent.username',
                            'label' => '上级代理',
                        ],
                        'realname',
                        'promo_code',

                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                $status = Agent::getStatuses();
                                return $status[$model->status];
                            }
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
                            'label' => '可提现额度',
                            'value' => function ($model) {
                                return Util::formatMoney($model->account->available_amount);
                            }
                        ],
                        [
                            'label' => '冻结额度',
                            'value' => function ($model) {
                                return Util::formatMoney($model->account->frozen_amount);
                            }
                        ],
                        [
                            'label' => '累计收入',
                            'value' => function ($model) {
                                return Util::formatMoney($model->account->total_amount);
                            }
                        ],
                        [
                            'label' => '累计洗码额度',
                            'value' => function ($model) {
                                return Util::formatMoney($model->account->total_xima_amount);
                            }
                        ],
                        [
                            'label' => '累计返佣额度(扣除洗码收入外)',
                            'value' => function ($model) {
                                return Util::formatMoney($model->account->total_rebate_amount);
                            }
                        ],
                        [
                            'label' => '累计用户投注额度',
                            'value' => function ($model) {
                                return Util::formatMoney($model->account->bet_amount);
                            }
                        ],
                        'created_at:datetime',
                        'updated_at:datetime',
                        ['label' => '会员推广链接',
                            'value' => function ($model) {
                                return yii::$app->feehi->agent_user_reg_url . '?code=' . $model->promo_code;
                            }
                        ],
                        ['label' => '代理推广链接',
                            'value' => function ($model) {
                                return yii::$app->feehi->agent_reg_url . '?code=' . $model->promo_code;
                            }
                        ]
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>
