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
                        ['attribute' => 'ymd', 'value' => function ($model) {
                            return date('Y-m-d', strtotime($model->ymd));
                        }],
                        'dnu',
                        'dau',
                        'ndu',
                        [
                            'attribute' => 'nda',
                            'format' => 'raw',
                            'value' => function($model){
                                return Util::formatMoney($model->nda,false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['nda'], false) . '</span>'
                        ],
                        'dbu',
                        [
                            'attribute' => 'dba',
                            'format' => 'raw',
                            'value' => function($model){
                                return Util::formatMoney($model->dba,false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['dba'], false) . '</span>'
                        ],
                        'ddu',
                        [
                            'attribute' => 'dda',
                            'format' => 'raw',
                            'value' => function($model){
                                return Util::formatMoney($model->dda,false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['dda'], false) . '</span>'
                        ],
                        'dwu',
                        [
                            'attribute' => 'dwa',
                            'format' => 'raw',
                            'value' => function($model){
                                return Util::formatMoney($model->dwa,false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['dwa'], false) . '</span>'
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
