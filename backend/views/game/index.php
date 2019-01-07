<?php

use backend\models\PlatformGame;
use common\helpers\Util;
use common\widgets\Bar;
use common\grid\CheckboxColumn;
use common\grid\ActionColumn;
use common\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PlatformGameSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '游戏管理';
$this->params['breadcrumbs'][] = '游戏管理';
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <div class="toolbar clearfix">
                    <?= Bar::widget([
                        'template' => '{refresh} {create} ',
                    ]) ?>
                    <?= $this->render('_search', ['model' => $searchModel]); ?>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'showFooter' => true,
                    'footerRowOptions' => ['style' => 'font-weight:bold;'],
                    'columns' => [

                        [
                            'attribute' => 'platform_id',
                            'value' => function ($model) {
                                return $model->platform->name;
                            },
                            'footer' => '合计'
                        ],
                        [
                            'attribute' => 'platform_id',
                            'label' => '平台代码',
                            'value' => function ($model) {
                                return $model->platform->code;
                            }
                        ],

                        [
                            'attribute' => 'game_type_id',
                            'value' => function ($model) {
                                return $model->gameType->name;
                            }
                        ],
                        'game_name',
                        'game_name_en',
                        [
                            'attribute' => 'game_icon_url',
                            'format' => 'raw',
                            'value' => function ($model) {
                                if ($model->game_icon_url)
                                    return "<img style='max-width: 150px;max-height: 100px' src='" . Url::to('@web' . $model->game_icon_url) . "'>";
                                else
                                    return '-';
                            }
                        ],
                        [
                            'attribute' => 'status',
                            'format' => 'raw',
                            'value' => function ($model) {
                                $status = PlatformGame::getStatuses();
                                return '<span class="label label-' . ($model->status == PlatformGame::STATUS_ENABLED ? 'primary' : 'default') . '">' . ($status[$model->status] ?? "停用") . '</span>';
                            }
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
                            'attribute' => 'bet_num',
                            'footer' => '<span class="label label-default">' . $totals['bet_num'] . '</span>'
                        ],

                        ['class' => ActionColumn::className(),
                            'template' => '{update} {delete}',
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>