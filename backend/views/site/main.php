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
    var option = {
        legend: {},
        tooltip: {},
        dataset: {
            source: [
                ['时间', '2015', '2016', '2017'],
                ['新增用户', 43.3, 85.8, 93.7],
                ['活跃用户', 83.1, 73.4, 55.1],
                ['首付用户', 86.4, 65.2, 82.5],
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


    userChart.setOption(option);
</script>

<?php JsBlock::end() ?>
