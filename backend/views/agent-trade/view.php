<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AgentAccountRecord */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Agent Account Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agent-account-record-view">

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
            'agent_id',
            'name',
            'amount',
            'switch',
            'after_amount',
            'remark',
            'updated_at',
            'created_at',
        ],
    ]) ?>

</div>
