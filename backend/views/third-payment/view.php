<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CompanyBank */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '第三方支付列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-bank-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'code',
            'deposit_min',
            'deposit_max',
            'withdraw_min',
            'withdraw_max',
            'sort',
            'status',
            [
                'attribute' => 'created_at',
                'format'=>'date',
            ],
            [
                'attribute' => 'updated_at',
                'format'=>'date',
            ],
        ],
    ]) ?>

</div>
