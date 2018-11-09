<?php

use backend\models\CompanyBank;
use common\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CompanyBank */
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
                        <?= $form->field($model, 'bank_username')->textInput(['maxlength' => true]) ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'bank_account')->textInput(['maxlength' => true]) ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'bank_name')->textInput(['maxlength' => true]) ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'province')->textInput(['maxlength' => true]) ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'branch_name')->textInput(['maxlength' => true]) ?>
                        <div class="hr-line-dashed"></div>


                <?= $form->field($model, 'card_type')->radioList(CompanyBank::getCardTypes()) ?>
                        <div class="hr-line-dashed"></div>


                <?= $form->field($model, 'status')->radioList(CompanyBank::getStatuses()) ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->defaultButtons() ?>
                    <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>