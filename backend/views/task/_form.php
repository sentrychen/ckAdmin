<?php

use common\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Task */
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
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'route')->textInput(['maxlength' => true]) ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'crontab_str')->textInput(['maxlength' => true]) ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'switch')->textInput() ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'status')->textInput() ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'run_times')->textInput() ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'error_times')->textInput() ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'last_run_at')->textInput() ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'next_run_at')->textInput() ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'exec_mem')->textInput() ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'exec_time')->textInput() ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->defaultButtons() ?>
                    <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>