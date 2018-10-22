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
                        <h1 class="no-margins"><?= $statics['dnu'] ?></h1>
                        <div class="font-bold text-navy">
                            <small>新增会员</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h1 class="no-margins"><?= $statics['dau'] ?></h1>
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
                        <h1 class="no-margins"><?= $statics['ndu'] ?></h1>
                        <div class="font-bold text-info">
                            <small>首存用户</small>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h1 class="no-margins">¥ <?= $statics['nda'] ?></h1>
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
                        <h1 class="no-margins"><?= $statics['ddu'] ?></h1>
                        <div class="font-bold text-warning">
                            <small>存款用户</small>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h1 class="no-margins">¥ <?= $statics['dda'] ?></h1>
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
                <h5>赢输</h5>
            </div>
            <div class="ibox-content">

                <div class="row">
                    <div class="col-md-6">
                        <h1 class="no-margins">¥ <?= $statics['dpa'] ?></h1>
                        <div class="font-bold text-navy">
                            <small>赢额度</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h1 class="no-margins">¥ <?= $statics['dla'] ?></h1>
                        <div class="font-bold text-navy">
                            <small>输额度</small>
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
                        <h1 class="no-margins"><?= $statics['dbu'] ?></h1>
                        <div class="font-bold text-info">
                            <small>投注用户</small>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h1 class="no-margins">¥ <?= $statics['dba'] ?></h1>
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
                        <h1 class="no-margins"><?= $statics['dwu'] ?></h1>
                        <div class="font-bold text-warning">
                            <small>取款用户</small>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h1 class="no-margins">¥ <?= $statics['dwa'] ?></h1>
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
        dataset: {
            source: [
                ['用户', '新增用户', '活跃用户', '首付用户'],
                ['1月', 234, 98, 23],
                ['2月', 311, 133, 34],
                ['3月', 420, 156, 66],
                ['4月', 288, 99, 56],
                ['5月', 122, 67, 34],
                ['6月', 432, 112, 66],
                ['7月', 324, 112, 56],
                ['8月', 458, 146, 66],
                ['9月', 550, 168, 78],
            ]
        },
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
            source: [
                ['存取款', '存款', '取款'],
                ['1月', 23456, 21398],
                ['2月', 31451, 22133],
                ['3月', 42340, 56156],
                ['4月', 28338, 12399],
                ['5月', 14422, 9267],
                ['6月', 43222, 51512],
                ['7月', 32344, 6112],
                ['8月', 45668, 32146],
                ['9月', 55550, 65168],
            ]
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
            source: [
                ['游戏平台', '皇家国际', '威尼斯人','机械臂'],
                ['1月', 23456, 21398,34324],
                ['2月', 31451, 22133,45667],
                ['3月', 42340, 56156,23421],
                ['4月', 28338, 12399,43221],
                ['5月', 14422, 9267,6533],
                ['6月', 43222, 51512,26755],
                ['7月', 32344, 6112,65332],
                ['8月', 45668, 32146,5645],
                ['9月', 55550, 65168,33456],
            ]
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
            source: [
                ['游戏平台', '赢输','皇家国际', '威尼斯人','机械臂'],
                ['1月',160587, 43546, 71398,45643],
                ['2月', -34965,-63141, 22533,5643],
                ['3月', 129739,4230, 56756,68753],
                ['4月', 20261,28338, -12399,4322],
                ['5月', -92699,14422, -99267,-7854],
                ['6月', 70664,43222, -51512,78954],
                ['7月', -73041,-32344, -6112,-34585],
                ['8月', 21044,-45668, 32146,34566],
                ['9月', 185053,55550, 65168,64335],
            ]
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
