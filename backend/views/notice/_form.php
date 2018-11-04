<?php

use common\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Notice */
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
                    <?= $form->field($model, 'content')->textarea([]) ?>
                        <div class="hr-line-dashed"></div>

                <?= $form->field($model, 'user_type')->radioList(\backend\models\Notice::getUserTypes()) ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'expire_at')->dateRange(['singleDatePicker'=>true],['value'=>date('Y-m-d',strtotime('+6 day'))]) ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->field($model, 'set_top')->radioList(\common\libs\Constants::getYesNoItems()) ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->defaultButtons() ?>
                    <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>