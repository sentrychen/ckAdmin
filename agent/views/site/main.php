<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-31 14:17
 */

use agent\assets\EchartAsset;
use agent\models\Agent;
use common\widgets\JsBlock;
use yii\helpers\Url;
use yii\widgets\DetailView;

/**
 * @var $statics array
 */
EchartAsset::register($this);
?>
    <div class="row">
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>代理总数</h5>
                </div>
                <div class="ibox-content openContab" href="<?= Url::to(['agent/index']) ?>"
                     title="下级代理" style="cursor: pointer">
                    <h1 class="no-margins"><?= $statics['agentTotal'] ?></h1>
                    <div class="stat-percent font-bold text-success"></div>
                    <small><?= yii::t('app', 'Total') ?></small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>今日新增代理</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?= $statics['agentToday'] ?></h1>
                    <div class="stat-percent font-bold text-info"></div>
                    <small><?= yii::t('app', 'Total') ?></small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>会员总数</h5>
                </div>
                <div class="ibox-content openContab" href="<?= Url::to(['user/index']) ?>"
                     title="<?= yii::t('app', 'Users') ?>" style="cursor: pointer">
                    <h1 class="no-margins"><?= $statics['userTotal'] ?></h1>
                    <div class="stat-percent font-bold text-navy"></div>
                    <small><?= yii::t('app', 'Total') ?></small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>今日新增会员</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?= $statics['agentToday'] ?></h1>
                    <div class="stat-percent font-bold text-info"></div>
                    <small><?= yii::t('app', 'Total') ?></small>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>累计洗码额度</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?= Yii::$app->formatter->asCurrency($statics['ximaTotal']) ?></h1>
                    <div class="stat-percent font-bold text-success"></div>
                    <small><?= yii::t('app', 'Total') ?></small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>今日洗码额度</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?= Yii::$app->formatter->asCurrency($statics['ximaToday']) ?></h1>
                    <div class="stat-percent font-bold text-info"></div>
                    <small><?= yii::t('app', 'Total') ?></small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>累计返佣额度</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?= Yii::$app->formatter->asCurrency($statics['rebateTotal']) ?></h1>
                    <div class="stat-percent font-bold text-navy"></div>
                    <small><?= yii::t('app', 'Total') ?></small>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>上月返佣额度</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?= Yii::$app->formatter->asCurrency($statics['rebateLastMonth']) ?></h1>
                    <div class="stat-percent font-bold text-info"></div>
                    <small><?= yii::t('app', 'Total') ?></small>
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
                <div class="ibox-content" style="height:418px;">
                    <?= DetailView::widget(['model' => yii::$app->getUser()->getIdentity(),
                        'attributes' => ['username',
                            ['label' => '上级代理',
                                'attribute' => 'parent.username'],
                            ['attribute' => 'status',
                                'value' => function ($model) {
                                    $status = Agent::getStatuses();
                                    return isset($status[$model->status]) ? $status[$model->status] : "异常";
                                }],
                            'created_at:date',
                            ['label' => '可提现额度',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return '<span class="label label-warning">' . yii::$app->formatter->asCurrency($model->account->available_amount) . '</span>';
                                }],
                            ['label' => '会员推广链接',
                                'value' => function ($model) {
                                    return yii::$app->option->agent_user_reg_url . '?code=' . $model->promo_code;
                                }],
                            ['label' => '代理推广链接',
                                'value' => function ($model) {
                                    return yii::$app->option->agent_reg_url . '?code=' . $model->promo_code;
                                }],
                            ['label' => '代理推广二维码',
                                'format' => 'raw',
                                'value' => '<img src=' . Url::to(['site/code']) . ' />',]],]) ?>

                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>投注赢输</h5>
                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-xs btn-white active">天</button>
                            <button type="button" class="btn btn-xs btn-white">月</button>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="flot-chart" style="height:382px;">
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
                {type: 'bar', stack: 'game'}
            ]
        };
        wlChart.setOption(wlOption);
        window.onresize = function () {

            wlChart.resize();
        }
    </script>

<?php JsBlock::end() ?>