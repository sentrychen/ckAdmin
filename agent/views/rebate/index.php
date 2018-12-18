<?php

use common\widgets\Bar;
use common\grid\CheckboxColumn;
use common\grid\ActionColumn;
use common\grid\GridView;
use common\grid\DateColumn;
use common\helpers\Util;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\RebateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '代理佣金';
$this->params['breadcrumbs'][] = '代理佣金';
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
                    'columns' => [
                        'ym',
                        'agent_name',
                        [
                            'attribute' => 'rebate_rate',
                            'format' => ['percent', 2],
                        ],
                        [
                            'attribute' => 'self_bet_amount',
                            'format' => 'raw',
                            'value' => function($model){
                                return Util::formatMoney($model->self_bet_amount,false);
                            }
                        ],
                        [
                            'attribute' => 'self_profit_loss',
                            'format' => 'raw',
                            'value' => function($model){
                                return Util::formatMoney($model->self_profit_loss,false);
                            }
                        ],
                        [
                            'attribute' => 'sub_bet_amount',
                            'format' => 'raw',
                            'value' => function($model){
                                return Util::formatMoney($model->sub_bet_amount,false);
                            }
                        ],
                        [
                            'attribute' => 'sub_profit_loss',
                            'format' => 'raw',
                            'value' => function($model){
                                return Util::formatMoney($model->sub_profit_loss,false);
                            }
                        ],
                        [
                            'attribute' => 'sub_rebate_amount',
                            'format' => 'raw',
                            'value' => function($model){
                                return Util::formatMoney($model->sub_rebate_amount,false);
                            }
                        ],
                        [
                            'attribute' => 'self_rebate_amount',
                            'format' => 'raw',
                            'value' => function($model){
                                return Util::formatMoney($model->self_rebate_amount,false);
                            }
                        ],
                        [
                            'attribute' => 'total_rebate_amount',
                            'format' => 'raw',
                            'value' => function($model){
                                return Util::formatMoney($model->total_rebate_amount,false);
                            }
                        ],
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
