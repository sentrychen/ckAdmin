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
 * @var $searchModel backend\models\search\AgentXimaRecordSearch
 * @var $total array
 */

use common\grid\DateColumn;
use common\grid\GridView;
use common\libs\Constants;
use common\helpers\Util;
?>

<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <div class="toolbar clearfix" style="width:100%;">
                    <?= $this->render('_search_agent_xima', ['model' => $searchModel]); ?>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'showFooter' => true,
                    'footerRowOptions' => ['style' => 'font-weight:bold;'],
                    'columns' => [

                        [
                            'attribute' => 'record_id',
                        ],
                        [
                            'attribute' => 'agent_id',
                            'value' => 'agent.username',
                            'label' => '代理',
                        ],
                        [
                            'attribute' => 'user_id',
                            'value' => 'user.username',
                            'label' => '投注玩家',
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
                            'attribute' => 'bet_amount',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Util::formatMoney($model->bet_amount, false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['bet_amount'], false) . '</span>'
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
                            'attribute' => 'xima_type',
                            'value' => function ($model) {
                                if ($model->xima_type == Constants::XIMA_ONE_SIDED)
                                    return '单边';
                                return '双边';
                            },
                        ],
                        [
                            'attribute' => 'xima_rate',
                            'format' => ['percent', 2],
                        ],

                        [
                            'attribute' => 'xima_amount',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Util::formatMoney($model->xima_amount, false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['xima_amount'], false) . '</span>'
                        ],
                        [
                            'attribute' => 'sub_xima_rate',
                            'format' => ['percent', 2],
                        ],
                        [
                            'attribute' => 'sub_xima_amount',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Util::formatMoney($model->sub_xima_amount, false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['sub_xima_amount'], false) . '</span>'
                        ],
                        [
                            'class' => DateColumn::class,
                            'attribute' => 'created_at'
                        ],
                    ]
                ]); ?>
            </div>
        </div>

    </div>
</div>
