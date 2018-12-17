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

                    <?= $this->render('_search_rebate', ['model' => $searchModel]); ?>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'columns' => [
                        'ym',
                        'agent_id',
                        'agent_name',
                        'agent_level',
                        [
                            'attribute' => 'rebate_rate',
                            'format' => ['percent', 2],
                        ],
                        [
                            'attribute' => 'self_bet_amount',
                            'width' => 80,
                            'format' => 'raw',
                            'value' => function($searchModel){
                                return Util::formatMoney($searchModel->self_bet_amount,false);
                            }
                        ],

                        [
                            'attribute' => 'self_profit_loss',
                            'width' => 70,
                            'format' => 'raw',
                            'value' => function($searchModel){
                                return Util::formatMoney($searchModel->self_profit_loss,false);
                            }
                        ],


                        [
                            'attribute' => 'sub_bet_amount',
                            'width' => 90,
                            'format' => 'raw',
                            'value' => function($searchModel){
                                return Util::formatMoney($searchModel->sub_bet_amount,false);
                            }
                        ],
                        [
                            'attribute' => 'sub_profit_loss',
                            'width' => 90,
                            'format' => 'raw',
                            'value' => function($searchModel){
                                return Util::formatMoney($searchModel->sub_profit_loss,false);
                            }
                        ],
                        [
                            'attribute' => 'sub_rebate_amount',
                            'format' => 'raw',
                            'value' => function($searchModel){
                                return Util::formatMoney($searchModel->sub_rebate_amount,false);
                            }
                        ],
                        [
                            'attribute' => 'self_rebate_amount',
                            'format' => 'raw',
                            'value' => function($searchModel){
                                return Util::formatMoney($searchModel->self_rebate_amount,false);
                            }
                        ],
                        [
                            'attribute' => 'total_rebate_amount',
                            'format' => 'raw',
                            'value' => function($searchModel){
                                return Util::formatMoney($searchModel->total_rebate_amount,false);
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
