<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-31 14:17
 */

use agent\assets\EchartAsset;
use agent\models\Agent;
use common\helpers\Util;
use common\widgets\JsBlock;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/**
 * @var $statics array
 * @var $agent Agent
 */
EchartAsset::register($this);
?>
    <div class="row">
        <div class="col-sm-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h4>会员发展</h4>
                </div>
                <div class="ibox-content openContab" title="会员列表" href="<?= Url::to(['user/index']) ?>"
                     style="cursor: pointer">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="no-margins"><?= $statics['userTotal'] ?></h1>
                            <div class="font-bold text-navy">
                                <small>累计注册</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h1 class="no-margins"><?= $statics['userToday'] ?></h1>
                            <div class="font-bold text-navy">
                                <small>今日新增</small>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h4>代理发展</h4>
                </div>
                <div class="ibox-content openContab" title="下级代理" href="<?= Url::to(['agent/index']) ?>"
                     style="cursor: pointer">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="no-margins"><?= $statics['agentTotal'] ?></h1>
                            <div class="font-bold text-navy">
                                <small>累计注册</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h1 class="no-margins"><?= $statics['agentToday'] ?></h1>
                            <div class="font-bold text-navy">
                                <small>今日新增</small>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h4>收入统计</h4>
                </div>
                <div class="ibox-content openContab" title="交易记录" href="<?= Url::to(['agent-trade/index']) ?>"
                     style="cursor: pointer">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="no-margins"><?= Util::formatMoney($agent->account->total_amount, false) ?></h1>
                            <div class="font-bold text-warning">
                                <small>累计收入(￥)</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h1 class="no-margins"><?= Util::formatMoney($statics['amountToday'], false) ?></h1>
                            <div class="font-bold text-warning">
                                <small>今日收入(￥)</small>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h4>账户余额</h4>
                </div>
                <div class="ibox-content openContab" title="交易记录" href="<?= Url::to(['agent-trade/index']) ?>"
                     style="cursor: pointer">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="no-margins"><?= Util::formatMoney($agent->account->available_amount, false) ?></h1>
                            <div class="font-bold text-warning">
                                <small>可提现额度(￥)</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h1 class="no-margins"><?= Util::formatMoney($agent->account->frozen_amount, false) ?></h1>
                            <div class="font-bold text-warning">
                                <small>已冻结额度(￥)</small>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>当前代理信息</h5>
                </div>
                <div class="ibox-content" style="height:414px;">
                    <?= DetailView::widget(['model' => $agent,
                        'attributes' => [
                            [
                                'attribute' => 'username',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return Html::a($model->username, Url::to(['agent/view', 'id' => $model->id]), [
                                        'title' => '查看个人详细资料',
                                        'data-pjax' => '0',
                                        'class' => 'openContab',
                                    ]);
                                },
                            ],
                            ['label' => '上级代理',
                                'attribute' => 'parent.username'
                            ],
                            'created_at:date',
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
                            ['label' => '会员推广链接',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return Html::a(yii::$app->option->agent_user_reg_url . '?code=' . $model->promo_code, yii::$app->option->agent_user_reg_url . '?code=' . $model->promo_code, ['target' => '_blank']);
                                }],
                            ['label' => '代理推广链接',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return Html::a(yii::$app->option->agent_reg_url . '?code=' . $model->promo_code, yii::$app->option->agent_reg_url . '?code=' . $model->promo_code, ['target' => '_blank']);
                                },
                            ],
                            ['label' => '代理推广二维码',
                                'format' => 'raw',
                                'value' => '<img src=' . Url::to(['site/code']) . ' />',]],]) ?>

                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>投注赢输(￥)</h5>
                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-xs btn-white active">天</button>
                            <button type="button" class="btn btn-xs btn-white">月</button>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="flot-chart" style="height:378px;">
                        <div class="flot-chart-content" id="flot-wl-chart"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php JsBlock::begin() ?>
    <script type="text/javascript">


        let wlChart = echarts.init(document.getElementById('flot-wl-chart'), 'light');

        let wlOption = {
            legend: {},
            grid: {
                top: 40,
                left: 10,
                right: 10,
                bottom: 10,
                containLabel: true
            },
            tooltip: {
                trigger: 'axis',
                axisPointer: {
                    type: 'cross',
                    label: {
                        backgroundColor: '#6a7985'
                    }
                }
            },
            dataset: {
                source: <?= $winLost ?>
            },
            xAxis: {type: 'category'},
            yAxis: {},
            series: [
                {type: 'line'},
                {type: 'bar', stack: 'game'},
                {type: 'bar', stack: 'game'},
            ]
        };
        wlChart.setOption(wlOption);
        window.onresize = function () {

            wlChart.resize();
        }
    </script>

<?php JsBlock::end() ?>