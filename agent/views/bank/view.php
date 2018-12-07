<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use agent\models\AgentBank;
/* @var $this yii\web\View */
/* @var $model agent\models\AgentBank */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Company Banks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-bank-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'agent_id',
            'username',
            'bank_username',
            'bank_account',
            'bank_name',
            'province',
            'city',
            'branch_name',
            [
                'attribute' => 'card_type',
                'value' => function ($model) {
                    $type = AgentBank::getCardTypes();
                    return $type[$model->card_type];
                }
            ],
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    $status = AgentBank::getStatuses();
                    return $status[$model->status];
                }
            ],

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
