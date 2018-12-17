<?php

/**
 * @var $statics array
 */

use backend\assets\EchartAsset;
use common\widgets\JsBlock;

EchartAsset::register($this);

?>
<div class="row">
    <div class="col-sm-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-primary pull-right">最近30天</span>
                <h5>会员</h5>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="no-margins"><?= $userCount ?></h1>
                        <div class="font-bold text-navy">
                            <small>新增会员</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h1 class="no-margins"><?= $actUser ?></h1>
                        <div class="font-bold text-navy">
                            <small>活跃会员</small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-info pull-right">最近30天</span>
                <h5>首存</h5>
            </div>
            <div class="ibox-content">

                <div class="row">
                    <div class="col-md-5">
                        <h1 class="no-margins"><?= $userDeposit['user'] ?></h1>
                        <div class="font-bold text-info">
                            <small>首存用户</small>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h1 class="no-margins"><?= Yii::$app->formatter->asCurrency($userDeposit['amount']) ?></h1>
                        <div class="font-bold text-info">
                            <small>首存额度</small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-warning pull-right">最近30天</span>
                <h5>存款</h5>
            </div>
            <div class="ibox-content">

                <div class="row">
                    <div class="col-md-5">
                        <h1 class="no-margins"><?= $userDeposit['user'] ?></h1>
                        <div class="font-bold text-warning">
                            <small>存款用户</small>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h1 class="no-margins"><?= Yii::$app->formatter->asCurrency($userDeposit['all_amount'])?></h1>
                        <div class="font-bold text-warning">
                            <small>存款额度</small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-primary pull-right">最近30天</span>
                <h5>投注赢输</h5>
            </div>
            <div class="ibox-content">

                <div class="row">
                    <div class="col-md-5">
                        <h1 class="no-margins"><?= $useBet['num']?></h1>
                        <div class="font-bold text-navy">
                            <small>投注量</small>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h1 class="no-margins"><?= Yii::$app->formatter->asCurrency($useBet['profit'])?></h1>
                        <div class="font-bold text-navy">
                            <small>赢输</small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-info pull-right">最近30天</span>
                <h5>投注</h5>
            </div>
            <div class="ibox-content">

                <div class="row">
                    <div class="col-md-5">
                        <h1 class="no-margins"><?= $useBet['user'] ?></h1>
                        <div class="font-bold text-info">
                            <small>投注用户</small>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h1 class="no-margins"><?= Yii::$app->formatter->asCurrency($useBet['amount'])?></h1>
                        <div class="font-bold text-info">
                            <small>投注额度</small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-warning pull-right">最近30天</span>
                <h5>取款</h5>
            </div>
            <div class="ibox-content">

                <div class="row">
                    <div class="col-md-5">
                        <h1 class="no-margins"><?= $useWithdraw['user'] ?></h1>
                        <div class="font-bold text-warning">
                            <small>取款用户</small>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h1 class="no-margins"><?= Yii::$app->formatter->asCurrency($useWithdraw['amount'])?></h1>
                        <div class="font-bold text-warning">
                            <small>取款额度</small>
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
                <h5>用户</h5>
                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-xs btn-white active">天</button>
                        <button type="button" class="btn btn-xs btn-white">月</button>
                    </div>
                </div>
            </div>
            <div class="ibox-content">
                <div class="flot-chart">
                    <div class="flot-chart-content" id="flot-user-chart">
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-sm-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>存取款</h5>
                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-xs btn-white active">天</button>
                        <button type="button" class="btn btn-xs btn-white">月</button>
                    </div>
                </div>
            </div>
            <div class="ibox-content">
                <div class="flot-chart">
                    <div class="flot-chart-content" id="flot-dw-chart"></div>
                </div>
            </div>

        </div>
    </div>

</div>
<div class="row">
    <div class="col-sm-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>平台投注</h5>
                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-xs btn-white active">天</button>
                        <button type="button" class="btn btn-xs btn-white">月</button>
                    </div>
                </div>
            </div>
            <div class="ibox-content">
                <div class="flot-chart">
                    <div class="flot-chart-content" id="flot-bet-chart"></div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-sm-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>平台赢输</h5>
                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-xs btn-white active">天</button>
                        <button type="button" class="btn btn-xs btn-white">月</button>
                    </div>
                </div>
            </div>
            <div class="ibox-content">
                <div class="flot-chart">
                    <div class="flot-chart-content" id="flot-wl-chart"></div>
                </div>
            </div>

        </div>
    </div>

</div>
<?php JsBlock::begin() ?>
<script type="text/javascript">

    let userChart = echarts.init(document.getElementById('flot-user-chart'));
    let dwChart = echarts.init(document.getElementById('flot-dw-chart'),'light');
    let betChart = echarts.init(document.getElementById('flot-bet-chart'));
    let wlChart = echarts.init(document.getElementById('flot-wl-chart'),'light');
    let userOption = {
        legend: {},
        grid: {
            top:40,
            left: 10,
            right: 10,
            bottom: 10,
            containLabel: true
        },
        tooltip : {
            trigger: 'axis',
            axisPointer: {
                type: 'cross',
                label: {
                    backgroundColor: '#6a7985'
                }
            }
        },
        dataset: {source:<?= $userSum; ?>},
        xAxis: {type: 'category'},
        yAxis: {},
        series: [
            {type: 'bar'},
            {type: 'bar'},
            {type: 'bar'},
        ]
    };
    let dwOption = {
        legend: {},
        grid: {
            top:40,
            left: 10,
            right: 10,
            bottom: 10,
            containLabel: true
        },
        tooltip : {
            trigger: 'axis',
            axisPointer: {
                type: 'cross',
                label: {
                    backgroundColor: '#6a7985'
                }
            }
        },
        dataset: {
            source: <?= $userDw?>
        },
        xAxis: {type: 'category',boundaryGap : false},
        yAxis: {},
        series: [
            {type: 'line',areaStyle: {},smooth:true},
            {type: 'line',areaStyle: {},smooth:true}
        ]
    };
    let betOption = {
        legend: {},
        grid: {
            top:40,
            left: 10,
            right: 10,
            bottom: 10,
            containLabel: true
        },
        tooltip : {
            trigger: 'axis',
            axisPointer: {
                type: 'cross',
                label: {
                    backgroundColor: '#6a7985'
                }
            }
        },
        dataset: {
            source: <?= $bet?>
        },
        xAxis: {type: 'category',boundaryGap : false},
        yAxis: {},
        series: [
            {type: 'line'},
            {type: 'line'},
            {type: 'line'}
        ]
    };
    let wlOption = {
        legend: {},
        grid: {
            top:40,
            left: 10,
            right: 10,
            bottom: 10,
            containLabel: true
        },
        tooltip : {
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
            {type: 'bar',stack:'game'},
            {type: 'bar',stack:'game'},
            {type: 'bar',stack:'game'}
        ]
    };
    userChart.setOption(userOption);
    dwChart.setOption(dwOption);
    betChart.setOption(betOption);
    wlChart.setOption(wlOption);
    window.onresize = function () {
        userChart.resize();
        dwChart.resize();
        betChart.resize();
        wlChart.resize();
    }
</script>

<?php JsBlock::end() ?>
