<?php

use common\widgets\Bar;
use common\grid\CheckboxColumn;
use common\grid\ActionColumn;
use common\grid\GridView;
use common\grid\DateColumn;
use common\helpers\Util;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\AgentDailySearch
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '代理日报';
$this->params['breadcrumbs'][] = '代理日报';
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <div class="toolbar clearfix">

                    <?= $this->render('_agent_search', ['model' => $searchModel]); ?>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'showFooter' => true,
                    'footerRowOptions' => ['style' => 'font-weight:bold;'],
                    'columns' => [
                        ['attribute' => 'ymd','footer' => '合计'],
                        ['attribute' => 'agent_id', 'value' => 'agent.username', 'label' => '代理名称'],
                        [
                            'attribute' => 'dnu',
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['dnu'], false) . '</span>'
                        ],
                        [
                            'attribute' => 'dau',
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['dau'], false) . '</span>'
                        ],
                        [
                            'attribute' => 'ndu',
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['ndu'], false) . '</span>'
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
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['dbu'], false) . '</span>'
                        ],
                        [
                            'attribute' => 'dbo',
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['dbo'], false) . '</span>'
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
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['ddu'], false) . '</span>'
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
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['dwu'], false) . '</span>'
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
                        'dna',

                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
