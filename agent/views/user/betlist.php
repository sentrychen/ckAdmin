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
 * @var $searchModel backend\models\search\BetListSearch
 * @var $total array
 */

use agent\models\BetList;
use common\grid\DateColumn;
use common\grid\GridView;
use common\helpers\Util;

$this->title = '投注记录';
$this->params['breadcrumbs'][] = '会员投注记录';

?>

<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <div class="toolbar clearfix">

                    <?= $this->render('_search_betlist', ['model' => $searchModel]); ?>
                </div>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'showFooter' => true,
                    'footerRowOptions' => ['style' => 'font-weight:bold;'],
                    'columns' => [

                        [
                            'attribute' => 'record_id',
                            'footer' => '合计'
                        ],
                        [
                            'attribute' => 'username',
                        ],
                        [
                            'attribute' => 'agent_name',
                            'value' => 'user.inviteAgent.username',
                            'label' => '所属代理',
                        ],
                        [
                            'attribute' => 'platform_id',
                            'value' => 'platform.name',
                            'label' => '游戏平台',
                        ],
                        [
                            'attribute' => 'game_type',
                            'value' => 'gameType.name'
                        ],
                        [
                            'attribute' => 'table_no',
                        ],
                        [
                            'attribute' => 'period_boot',
                            'footer' => '<span class="label label-default">' .number_format($totals['period_boot'], 0) . '</span>'
                        ],
                        [
                            'attribute' => 'period_round',
                        ],
                        [
                            'attribute' => 'bet_amount',
                            'width'=>70,
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Util::formatMoney($model->bet_amount, false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['bet_amount'], false) . '</span>'
                        ],
                        [
                            'attribute' => 'bet_record',
                            'format' => 'raw',
                            'value' => function ($model) {
                                $records = explode(',', $model->bet_record);
                                $tags = '';
                                foreach ($records as $record) {
                                    if ($record)
                                        $tags .= BetList::recordLabels($record) . ' ';
                                }
                                return $tags;
                            },
                        ],
                        [
                            'attribute' => 'game_result',
                            'format' => 'raw',
                            'value' => function ($model) {
                                $records = explode(',', $model->game_result);
                                $tags = '';
                                foreach ($records as $record) {
                                    if ($record)
                                        $tags .= BetList::recordLabels($record) . ' ';
                                }
                                return $tags;
                            },
                        ],
                        [
                            'attribute' => 'profit',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Util::formatMoney($model->profit, false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['profit'], false) . '</span>'
                        ],
                        [
                            'attribute' => 'amount_before',
                            'width'=>90,
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Util::formatMoney($model->amount_before, false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['amount_before'], false) . '</span>'
                        ],
                        [
                            'attribute' => 'amount_after',
                            'width'=>90,
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Util::formatMoney($model->amount_after, false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['amount_after'], false) . '</span>'
                        ],
                        [
                            'attribute' => 'xima',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Util::formatMoney($model->xima, false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['xima'], false) . '</span>'
                        ],
                        [
                            'class' => DateColumn::class,
                            'attribute' => 'bet_at'
                        ],
                    ]
                ]); ?>
            </div>
        </div>
    </div>
</div>