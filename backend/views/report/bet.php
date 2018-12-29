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
 * @var $totals array
 */

use backend\models\BetList;
use common\grid\DateColumn;
use common\grid\GridView;
use common\helpers\Util;

?>

<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <div class="toolbar clearfix">
                    <?= $this->render('_search_bet', ['model' => $searchModel]); ?>
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
                            'format' => 'raw',
                            'value' => function ($model) {
                                if (!$model->user) return '';
                                return Html::a($model->user->username, Url::to(['user/report', 'username' => $model->user->username]), [
                                    'title' => $model->user->username,
                                    'data-pjax' => '0',
                                    'class' => 'openContab',
                                ]);
                            }
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
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['bet_amount'], false) . '</span>'
                        ],
                        [
                            'attribute' => 'period_round',
                        ],
                        [
                            'attribute' => 'bet_amount',
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
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Util::formatMoney($model->amount_before, false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['amount_before'], false) . '</span>'
                        ],
                        [
                            'attribute' => 'amount_after',
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
