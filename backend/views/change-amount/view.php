<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ChangeAmountRecord */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Change Amount Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="change-amount-record-view">

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
            'user_id',
            'switch',
            'amount',
            'after_amount',
            'status',
            'remark',
            'submit_by_id',
            'submit_by_name',
            'audit_by_id',
            'audit_by_name',
            'audit_remark',
            'audit_at',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
