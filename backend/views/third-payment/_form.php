<?php

use backend\models\ThirdPayment;
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
                        'class' => 'form-horizontal',
                        //'enctype' => 'multipart/form-data'
                    ]
                ]); ?>
                <div class="hr-line-dashed"></div>
                        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'deposit_min')->textInput(['deposit_min' => true]) ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'deposit_max')->textInput(['deposit_max' => true]) ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'withdraw_min')->textInput(['withdraw_min' => true]) ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'withdraw_max')->textInput(['withdraw_max' => true]) ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'sort')->textInput(['maxlength' => true]) ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'status')->radioList(ThirdPayment::getStatuses()) ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->defaultButtons() ?>
                    <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>