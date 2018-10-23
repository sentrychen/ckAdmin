<?php

use backend\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Message */
/* @var $form backend\widgets\ActiveForm */
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
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'content')->textInput(['maxlength' => true]) ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'is_canceled')->textInput() ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'canceled_at')->textInput() ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'is_deleted')->textInput() ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'deleted_at')->textInput() ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'level')->textInput() ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'user_type')->textInput() ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'notify_obj')->textInput() ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'user_group')->textInput() ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'sender_id')->textInput() ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'sender_name')->textInput(['maxlength' => true]) ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'updated_at')->textInput() ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'created_at')->textInput() ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->defaultButtons() ?>
                    <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>