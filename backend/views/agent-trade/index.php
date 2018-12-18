<?php

use common\widgets\Bar;
use common\grid\CheckboxColumn;
use common\grid\ActionColumn;
use common\grid\GridView;
use common\grid\DateColumn;
use common\models\AgentAccountRecord;
use common\helpers\Util;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\AgentAccountRecordSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '代理交易记录';
$this->params['breadcrumbs'][] = '代理交易记录';
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <div class="toolbar clearfix">
                    <?= $this->render('_search', ['model' => $searchModel]); ?>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'showFooter' => true,
                    'footerRowOptions' => ['style' => 'font-weight:bold;'],
                    'columns' => [
                        'id',
                        [
                            'attribute' => 'agent_id',
                            'value' => 'agent.username',
                            'label' => '代理账号',
                        ],
                        'name',
                        [
                            'attribute' => 'amount',
                            'format' => 'raw',
                            'value' => function($model){
                                return Util::formatMoney($model->amount,false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['amount'], false) . '</span>'
                        ],
                        [
                            'attribute' => 'switch',
                            'value' => function ($model) {
                                return AgentAccountRecord::getSwitchStatus($model->switch);
                            }

                        ],
                        [
                            'attribute' => 'after_amount',
                            'format' => 'raw',
                            'value' => function($model){
                                return Util::formatMoney($model->after_amount,false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['after_amount'], false) . '</span>'
                        ],
                        'remark',
                        [
                            'class' => DateColumn::class,
                            'attribute' => 'created_at'
                        ],

                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
