<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Withdraw */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Withdraws', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-withdraw-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php //= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php
        /*
       echo Html::a('Delete', ['delete', 'id' => $model->id], [
           'class' => 'btn btn-danger',
           'data' => [
               'confirm' => 'Are you sure you want to delete this item?',
               'method' => 'post',
           ],
       ])
        */?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'apply_amount',
            'status',
            'transfer_amount',
            'remark',
            'audit_by_id',
            'audit_by_username',
            'audit_remark',
            'audit_at',
            'user_bank_id',
            'bank_name',
            'bank_account',
            'apply_ip',
            'updated_at',
            'created_at',
        ],
    ]) ?>

</div>
