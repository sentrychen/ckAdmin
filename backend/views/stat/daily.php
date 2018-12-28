<?php

use common\widgets\Bar;
use common\grid\CheckboxColumn;
use common\grid\ActionColumn;
use common\grid\GridView;
use common\grid\DateColumn;
use common\helpers\Util;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\DailySearch
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '系统日报';
$this->params['breadcrumbs'][] = '系统日报';
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <div class="toolbar clearfix">

                    <?= $this->render('_daily_search', ['model' => $searchModel]); ?>
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
                        [
                            'attribute' => 'dnu',
                            'footer' => '<span class="label label-default">' . number_format($totals['dnu'], 0) . '</span>'
                        ],
                        [
                            'attribute' => 'dau',
                            'footer' => '<span class="label label-default">' . number_format($totals['dau'], 0) . '</span>'
                        ],
                        [
                            'attribute' => 'ndu',
                            'footer' => '<span class="label label-default">' . number_format($totals['ndu'], 0) . '</span>'
                        ],
                        [
                            'attribute' => 'nda',
                            'format' => 'raw',
                            'value' => function($model){
                                return Util::formatMoney($model->nda,false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['nda'], false) . '</span>'
                        ],

                        [
                            'attribute' => 'dbu',
                            'footer' => '<span class="label label-default">' . number_format($totals['dbu'], 0) . '</span>'
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
                            'attribute' => 'ddu',
                            'footer' => '<span class="label label-default">' . number_format($totals['ddu'], 0) . '</span>'
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
                            'attribute' => 'dwu',
                            'footer' => '<span class="label label-default">' . number_format($totals['dwu'], 0) . '</span>'
                        ],
                        [
                            'attribute' => 'dwa',
                            'format' => 'raw',
                            'value' => function($model){
                                return Util::formatMoney($model->dwa,false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['dwa'], false) . '</span>'
                        ],
                        [
                            'attribute' => 'dxm',
                            'format' => 'raw',
                            'value' => function($model){
                                return Util::formatMoney($model->dxm, false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['dxm'], false) . '</span>'
                        ],
                        [
                            'attribute' => 'dpl',
                            'format' => 'raw',
                            'value' => function($model){
                                return Util::formatMoney((int)$model->dla - (int)$model->dpa - (float)$model->dxm, false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['dla'] - $totals['dpa'] - $totals['dxm'], false) . '</span>'
                        ],

                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
