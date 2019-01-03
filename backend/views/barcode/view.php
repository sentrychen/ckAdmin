<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CompanyBank */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '二维码管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-bank-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            //'url',
            [
                'attribute' => 'icon',
                'label'=>'图标',
                'format'=>'raw',
                'value' => function($model){
                    if($model->icon)
                        return "<img style='max-width:120px;max-height:120px' src='" . $model->icon . "' >";
                }
            ],
            'deposit_min',
            'deposit_max',
            'withdraw_min',
            'withdraw_max',
            //'url_code',
            'sort',
            'code_type',
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
