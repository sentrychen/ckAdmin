<?php

use common\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ChangeAmountRecord */
/* @var $form common\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <?php $form = ActiveForm::begin([
                    'options' => [
                        'class' => 'form-horizontal'
                    ]
                ]); ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'id')->textInput() ?>
                <div class="hr-line-dashed"></div>

                <?= $form->field($model, 'user_id')->textInput(['maxlength' => true]) ?>
                <div class="hr-line-dashed"></div>

                <?= $form->field($model, 'switch')->textInput() ?>
                <div class="hr-line-dashed"></div>

                <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>
                <div class="hr-line-dashed"></div>

                <?= $form->field($model, 'after_amount')->textInput(['maxlength' => true]) ?>
                <div class="hr-line-dashed"></div>

                <?= $form->field($model, 'status')->textInput() ?>
                <div class="hr-line-dashed"></div>

                <?= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>
                <div class="hr-line-dashed"></div>

                <?= $form->field($model, 'submit_by_id')->textInput() ?>
                <div class="hr-line-dashed"></div>

                <?= $form->field($model, 'submit_by_name')->textInput(['maxlength' => true]) ?>
                <div class="hr-line-dashed"></div>

                <?= $form->field($model, 'audit_by_id')->textInput() ?>
                <div class="hr-line-dashed"></div>

                <?= $form->field($model, 'audit_by_name')->textInput(['maxlength' => true]) ?>
                <div class="hr-line-dashed"></div>

                <?= $form->field($model, 'audit_remark')->textInput(['maxlength' => true]) ?>
                <div class="hr-line-dashed"></div>

                <?= $form->field($model, 'audit_at')->textInput() ?>
                <div class="hr-line-dashed"></div>

                <?= $form->field($model, 'created_at')->textInput() ?>
                <div class="hr-line-dashed"></div>

                <?= $form->field($model, 'updated_at')->textInput() ?>
                <div class="hr-line-dashed"></div>

                <?= $form->defaultButtons() ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>