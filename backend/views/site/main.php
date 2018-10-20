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

    var userChart = echarts.init(document.getElementById('flot-user-chart'));
    var dwChart = echarts.init(document.getElementById('flot-dw-chart'));
    var betChart = echarts.init(document.getElementById('flot-bet-chart'));
    var wlChart = echarts.init(document.getElementById('flot-wl-chart'));
    var userOption = {
        legend: {},
        tooltip: {},
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
            {type: 'bar'}
        ]
    };
    var dwOption = {
        legend: {},
        tooltip: {},
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
        xAxis: {type: 'category'},
        yAxis: {},
        series: [
            {type: 'line'},
            {type: 'line'}
        ]
    };
    userChart.setOption(userOption);
    dwChart.setOption(dwOption);

</script>

<?php JsBlock::end() ?>
