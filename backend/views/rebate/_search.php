<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\RebateSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rebate-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ym') ?>

    <?= $form->field($model, 'agent_id') ?>

    <?= $form->field($model, 'agent_name') ?>

    <?= $form->field($model, 'agent_level') ?>

    <?php // echo $form->field($model, 'self_bet_amount') ?>

    <?php // echo $form->field($model, 'sub_bet_amount') ?>

    <?php // echo $form->field($model, 'self_profit_loss') ?>

    <?php // echo $form->field($model, 'sub_profit_loss') ?>

    <?php // echo $form->field($model, 'total_sub_amount') ?>

    <?php // echo $form->field($model, 'cur_sub_amount') ?>

    <?php // echo $form->field($model, 'cur_rebate_amount') ?>

    <?php // echo $form->field($model, 'total_rebate_amount') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
