<?php

use backend\widgets\Bar;
use backend\grid\CheckboxColumn;
use backend\grid\ActionColumn;
use backend\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\AgentAccountRecordSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Agent Account Records';
$this->params['breadcrumbs'][] = 'Agent Account Records';
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
                        'agent_id',
                        'name',
                        'amount',
                        'switch',
                        // 'after_amount',
                        // 'remark',
                        // 'updated_at',
                        // 'created_at',

                        ['class' => ActionColumn::className(),],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
