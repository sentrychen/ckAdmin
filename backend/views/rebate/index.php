<?php

use backend\widgets\Bar;
use backend\grid\CheckboxColumn;
use backend\grid\ActionColumn;
use backend\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\RebateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rebates';
$this->params['breadcrumbs'][] = 'Rebates';
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <?= Bar::widget() ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => CheckboxColumn::className()],

                        'id',
                        'ym',
                        'agent_id',
                        'agent_name',
                        'agent_level',
                        // 'self_bet_amount',
                        // 'sub_bet_amount',
                        // 'self_profit_loss',
                        // 'sub_profit_loss',
                        // 'total_sub_amount',
                        // 'cur_sub_amount',
                        // 'cur_rebate_amount',
                        // 'total_rebate_amount',

                        ['class' => ActionColumn::className(),],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
