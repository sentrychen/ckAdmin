<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\UserDeposit */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Deposits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-deposit-view">

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
            'apply_amount',
            'status',
            'confirm_amount',
            'remark',
            'audit_by_id',
            'audit_by_username',
            'audit_remark',
            'audit_at',
            'pay_channel',
            'pay_username',
            'pay_nickname',
            'pay_info',
            'save_bank_id',
            'feedback',
            'feedback_remark',
            'feedback_at',
            'updated_at',
            'created_at',
        ],
    ]) ?>

</div>
