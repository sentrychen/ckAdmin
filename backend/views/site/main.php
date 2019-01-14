<?php

/**
 * @var $statics array
 */

use backend\assets\EchartAsset;
use common\helpers\Util;
use common\widgets\JsBlock;
use yii\helpers\Url;

EchartAsset::register($this);

?>
<div class="row" id="statics-box">
    <div class="col-sm-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <div class="btn-group pull-right" id="btn-user">
                    <button type="button" class="btn btn-xs btn-white active">今日</button>
                    <button type="button" class="btn btn-xs btn-white">本周</button>
                    <button type="button" class="btn btn-xs btn-white">本月</button>
                </div>
                <h5>会员</h5>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="no-margins" id="user-data1"><?= $statics['dnu'] ?? 0 ?></h1>
                        <div class="font-bold text-navy">
                            <small>新增会员</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h1 class="no-margins" id="user-data2"><?= $statics['dau'] ?? 0 ?></h1>
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
                <div class="btn-group pull-right" id="btn-firstpay">
                    <button type="button" class="btn btn-xs btn-white active">今日</button>
                    <button type="button" class="btn btn-xs btn-white">本周</button>
                    <button type="button" class="btn btn-xs btn-white">本月</button>
                </div>
                <h5>首存</h5>
            </div>
            <div class="ibox-content">

                <div class="row">
                    <div class="col-md-5">
                        <h1 class="no-margins" id="firstpay-data1"><?= $statics['ndu'] ?? 0 ?></h1>
                        <div class="font-bold text-info">
                            <small>首存用户</small>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h1 class="no-margins" id="firstpay-data2"><?= Util::formatMoney($statics['nda'], false) ?></h1>
                        <div class="font-bold text-info">
                            <small>首存额度(￥)</small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">

                <div class="btn-group pull-right" id="btn-deposit">
                    <button type="button" class="btn btn-xs btn-white active">今日</button>
                    <button type="button" class="btn btn-xs btn-white">本周</button>
                    <button type="button" class="btn btn-xs btn-white">本月</button>
                </div>
                <h5>存款</h5>
            </div>
            <div class="ibox-content">

                <div class="row">
                    <div class="col-md-5">
                        <h1 class="no-margins" id="deposit-data1"><?= $statics['ddu'] ?? 0 ?></h1>
                        <div class="font-bold text-warning">
                            <small>存款用户</small>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h1 class="no-margins" id="deposit-data2"><?= Util::formatMoney($statics['dda'], false) ?></h1>
                        <div class="font-bold text-warning">
                            <small>存款额度(￥)</small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <div class="btn-group pull-right" id="btn-profit">
                    <button type="button" class="btn btn-xs btn-white active">今日</button>
                    <button type="button" class="btn btn-xs btn-white">本周</button>
                    <button type="button" class="btn btn-xs btn-white">本月</button>
                </div>
                <h5>损益</h5>
            </div>
            <div class="ibox-content">

                <div class="row">
                    <div class="col-md-5">
                        <h1 class="no-margins" id="profit-data1"><?= $statics['dbo'] ?? 0 ?></h1>
                        <div class="font-bold text-navy">
                            <small>投注量</small>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h1 class="no-margins"
                            id="profit-data2"><?= Util::formatMoney($statics['dla'] - $statics['dpa'], false) ?></h1>
                        <div class="font-bold text-navy">
                            <small>投注损益(￥)</small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <div class="btn-group pull-right" id="btn-bet">
                    <button type="button" class="btn btn-xs btn-white active">今日</button>
                    <button type="button" class="btn btn-xs btn-white">本周</button>
                    <button type="button" class="btn btn-xs btn-white">本月</button>
                </div>
                <h5>投注</h5>
            </div>
            <div class="ibox-content">

                <div class="row">
                    <div class="col-md-5">
                        <h1 class="no-margins" id="bet-data1"><?= $statics['dbu'] ?? 0 ?></h1>
                        <div class="font-bold text-info">
                            <small>投注用户</small>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h1 class="no-margins" id="bet-data2"><?= Util::formatMoney($statics['dba'], false) ?></h1>
                        <div class="font-bold text-info">
                            <small>投注额度(￥)</small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <div class="btn-group pull-right" id="btn-withdraw">
                    <button type="button" class="btn btn-xs btn-white active">今日</button>
                    <button type="button" class="btn btn-xs btn-white">本周</button>
                    <button type="button" class="btn btn-xs btn-white">本月</button>
                </div>
                <h5>取款</h5>
            </div>
            <div class="ibox-content">

                <div class="row">
                    <div class="col-md-5">
                        <h1 class="no-margins" id="withdraw-data1"><?= $statics['dwu'] ?? 0 ?></h1>
                        <div class="font-bold text-warning">
                            <small>取款用户</small>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h1 class="no-margins" id="withdraw-data2"><?= Util::formatMoney($statics['dpa'], false) ?></h1>
                        <div class="font-bold text-warning">
                            <small>取款额度(￥)</small>
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
                <h5>赢输</h5>
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
    let dwChart = echarts.init(document.getElementById('flot-dw-chart'), 'light');
    let betChart = echarts.init(document.getElementById('flot-bet-chart'));
    let wlChart = echarts.init(document.getElementById('flot-wl-chart'), 'light');
    let userOption = {
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
            source: <?= $userDw?>
        },
        xAxis: {type: 'category', boundaryGap: false},
        yAxis: {},
        series: [
            {type: 'line', areaStyle: {}, smooth: true},
            {type: 'line', areaStyle: {}, smooth: true}
        ]
    };
    let betOption = {
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
            source: <?= $bet?>
        },
        xAxis: {type: 'category', boundaryGap: false},
        yAxis: {},
        series: [
            {type: 'line'},
            {type: 'line'},
        ]
    };
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
    userChart.setOption(userOption);
    dwChart.setOption(dwOption);
    betChart.setOption(betOption);
    wlChart.setOption(wlOption);
    window.onresize = function () {
        userChart.resize();
        dwChart.resize();
        betChart.resize();
        wlChart.resize();
    };
    $(function () {
        $('#statics-box').find('button.btn-white').click(function () {
            if ($(this).hasClass('active')) return false;
            let $this = $(this);
            let type = $this.parent('.btn-group').attr('id').substr(4);
            let tab = $(this).index();
            $.get('<?=Url::to(['site/load-sum-data'])?>?type=' + type + '&tab=' + tab, function (res) {
                if (res.length) {
                    $this.siblings('.active').removeClass('active');
                    $this.addClass('active');
                    $('#' + type + '-data1').text(res[0]);
                    $('#' + type + '-data2').text(res[1]);
                }
            });
        });
    });

</script>

<?php JsBlock::end() ?>
