<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Rebate */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rebates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rebate-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ym',
            'agent_id',
            'agent_name',
            'agent_level',
            'self_bet_amount',
            'sub_bet_amount',
            'self_profit_loss',
            'sub_profit_loss',
            'total_sub_amount',
            'cur_sub_amount',
            'cur_rebate_amount',
            'total_rebate_amount',
        ],
    ]) ?>

</div>
