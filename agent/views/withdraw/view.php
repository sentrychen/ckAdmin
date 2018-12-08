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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //'agent_id',
            'apply_amount',
            'status',
            'transfer_amount',
            'remark',
            //'audit_by_id',
            //'audit_by_username',
            'audit_remark',
            //'audit_at',
            //'agent_bank_id',
            'bank_name',
            'bank_account',
            //'apply_ip',
            [
                'attribute' => 'created_at',
                'value' => function ($model) {
                    return date('Y-m-d H:i:s',$model->created_at);
                }
            ],
            //'updated_at',
            [
                'attribute' => 'audit_at',
                'value' => function ($model) {
                    return date('Y-m-d H:i:s',$model->audit_at);
                }
            ],
        ],
    ]) ?>

</div>
