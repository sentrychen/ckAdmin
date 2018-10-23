<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\UserWithdrawSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-withdraw-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'apply_amount') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'transfer_amount') ?>

    <?php // echo $form->field($model, 'audit_by_id') ?>

    <?php // echo $form->field($model, 'audit_by_username') ?>

    <?php // echo $form->field($model, 'audit_remark') ?>

    <?php // echo $form->field($model, 'audit_at') ?>

    <?php // echo $form->field($model, 'user_bank_id') ?>

    <?php // echo $form->field($model, 'bank_name') ?>

    <?php // echo $form->field($model, 'bank_account') ?>

    <?php // echo $form->field($model, 'apply_ip') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
