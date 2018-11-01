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
            <div class="ibox-content openContab" href="<?= Url::to(['article/index']) ?>"
                 title="<?= yii::t('app', 'Articles') ?>" style="cursor: pointer">
                <h1 class="no-margins">20</h1>
                <div class="stat-percent font-bold text-success">1% <i
                            class="fa fa-bolt"></i></div>
                <small><?= yii::t('app', 'Total') ?></small>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>今日新增代理</h5>
            </div>
            <div class="ibox-content openContab" href="<?= Url::to(['comment/index']) ?>"
                 title="<?= yii::t('app', 'Comments') ?>" style="cursor: pointer">
                <h1 class="no-margins">10</h1>
                <div class="stat-percent font-bold text-info">0% <i
                            class="fa fa-level-up"></i></div>
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
                <h1 class="no-margins">85</h1>
                <div class="stat-percent font-bold text-navy">5% <i class="fa fa-level-up"></i>
                </div>
                <small><?= yii::t('app', 'Total') ?></small>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>今日新增会员</h5>
            </div>
            <div class="ibox-content openContab" href="<?= Url::to(['friendly-link/index']) ?>"
                 title="<?= yii::t('app', 'Friendly Links') ?>" style="cursor: pointer">
                <h1 class="no-margins">5</h1>
                <div class="stat-percent font-bold text-info">10.3% <i
                            class="fa fa-level-up"></i></div>
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
                <div class="ibox-content">
                    <?= DetailView::widget([
                        'model' => yii::$app->getUser()->getIdentity(),
                        'attributes' => [
                            'id',
                            'username',
                            [
                                'label' => '上级代理',
                                'attribute' => 'parent.username'
                            ],
                            [
                                'attribute' => 'status',
                                'value' => function ($model) {
                                    $status = Agent::getStatuses();
                                    return isset($status[$model->status]) ? $status[$model->status] : "异常";
                                }
                            ],
                            'created_at:date',

                            'account.available_amount:currency',
                            'account.frozen_amount:currency',

                        ],
                    ]) ?>

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
                    <div class="flot-chart" style="height:265px;">
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
                source: [
                    ['游戏平台', '赢输', '皇家国际', '威尼斯人', '机械版百乐'],
                    ['1月', 160587, 43546, 71398, 45643],
                    ['2月', -34965, -63141, 22533, 5643],
                    ['3月', 129739, 4230, 56756, 68753],
                    ['4月', 20261, 28338, -12399, 4322],
                    ['5月', -92699, 14422, -99267, -7854],
                    ['6月', 70664, 43222, -51512, 78954],
                    ['7月', -73041, -32344, -6112, -34585],
                    ['8月', 21044, -45668, 32146, 34566],
                    ['9月', 185053, 55550, 65168, 64335],
                ]
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