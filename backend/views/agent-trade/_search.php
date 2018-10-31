<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\AgentAccountRecordSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="agent-account-record-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'agent_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'amount') ?>

    <?= $form->field($model, 'switch') ?>

    <?php // echo $form->field($model, 'after_amount') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
