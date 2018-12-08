<?php

use common\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model agent\models\AgentWithdraw */
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

                        <?= $form->field($model, 'apply_amount')->textInput(['maxlength' => true]) ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'agent_bank_id')->dropDownList(\agent\models\AgentWithdraw::getStatuses()) ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'bank_account')->textInput(['maxlength' => true]) ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->defaultButtons() ?>
                    <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>