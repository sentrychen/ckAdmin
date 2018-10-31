<?php

use backend\widgets\Bar;
use backend\grid\CheckboxColumn;
use backend\grid\ActionColumn;
use backend\grid\GridView;
use common\grid\DateColumn;

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
                        'agent_id',
                        'agent_name',
                        'agent_level',
                        [
                            'attribute' => 'rebate_rate',
                            'format'=>['percent',2],
                        ],
                        [
                            'attribute' => 'self_bet_amount',
                            'format'=>'currency',
                        ],
                        [
                            'attribute' => 'self_profit_loss',
                            'format'=>'currency',
                        ],
                        [
                            'attribute' => 'sub_bet_amount',
                            'format'=>'currency',
                        ],
                        [
                            'attribute' => 'sub_profit_loss',
                            'format'=>'currency',
                        ],
                        [
                            'attribute' => 'sub_rebate_amount',
                            'format'=>'currency',
                        ],
                        [
                            'attribute' => 'self_rebate_amount',
                            'format'=>'currency',
                        ],
                        [
                            'attribute' => 'total_rebate_amount',
                            'format'=>'currency',
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
