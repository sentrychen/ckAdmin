<?php

use common\widgets\Bar;
use common\grid\CheckboxColumn;
use common\grid\ActionColumn;
use common\grid\GridView;
use common\grid\DateColumn;
use common\helpers\Util;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PlatformDailySearch
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '平台日报';
$this->params['breadcrumbs'][] = '平台日报';
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <div class="toolbar clearfix">

                    <?= $this->render('_platform_search', ['model' => $searchModel]); ?>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'showFooter' => true,
                    'footerRowOptions' => ['style' => 'font-weight:bold;'],
                    'columns' => [
                        [
                            'attribute' => 'ymd',
                            'value' => function ($model) {
                                return date('Y-m-d', strtotime($model->ymd));
                            },
                            'footer' => '合计'
                        ],
                        ['attribute' => 'platform_id', 'value' => 'platform.name'],
                        [
                            'attribute' => 'dnu',
                            'footer' => '<span class="label label-default">' . number_format($totals['dnu'], 0) . '</span>'
                        ],
                        [
                            'attribute' => 'dau',
                            'footer' => '<span class="label label-default">' . number_format($totals['dau'], 0) . '</span>'
                        ],
                        [
                            'attribute' => 'dua',
                            'format' => 'raw',
                            'value' => function($model){
                                return Util::formatMoney($model->dua,false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['dua'], false) . '</span>'
                        ],
                        [
                            'attribute' => 'dda',
                            'format' => 'raw',
                            'value' => function($model){
                                return Util::formatMoney($model->dda,false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['dda'], false) . '</span>'
                        ],

                        [
                            'attribute' => 'dbu',
                            'footer' => '<span class="label label-default">' .number_format($totals['dbu'], 0) . '</span>'
                        ],
                        [
                            'attribute' => 'dbo',
                            'footer' => '<span class="label label-default">' . number_format($totals['dbo'], 0) . '</span>'
                        ],
                        [
                            'attribute' => 'dba',
                            'format' => 'raw',
                            'value' => function($model){
                                return Util::formatMoney($model->dba,false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['dba'], false) . '</span>'
                        ],
                        [
                            'attribute' => 'dpa',
                            'format' => 'raw',
                            'value' => function($model){
                                return Util::formatMoney($model->dpa,false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['dpa'], false) . '</span>'
                        ],
                        [
                            'attribute' => 'dla',
                            'format' => 'raw',
                            'value' => function($model){
                                return Util::formatMoney($model->dla,false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['dla'], false) . '</span>'
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
