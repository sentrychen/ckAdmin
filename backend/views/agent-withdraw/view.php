<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Withdraw */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '代理取款列表', 'url' => ['index']];
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
            'agent_id',
            'apply_amount',
            'status',
            'transfer_amount',
            'remark',
            'audit_by_id',
            'audit_by_username',
            'audit_remark',
            [
                'attribute' => 'audit_at',
                'value' => function ($model) {
                    return date('Y-m-d H:i:s',$model->audit_at);
                }
            ],
            'agent_bank_id',
            'bank_name',
            'bank_account',
            'apply_ip',
            [
                'attribute' => 'created_at',
                'value' => function ($model) {
                    return date('Y-m-d H:i:s',$model->created_at);
                }
            ],
            [
                'attribute' => 'updated_at',
                'value' => function ($model) {
                    return date('Y-m-d H:i:s',$model->updated_at);
                }
            ],

        ],
    ]) ?>

</div>
