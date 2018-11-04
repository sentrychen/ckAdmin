<?php

use common\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Message */
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
                <?= $form->field($model, 'user_type')->radioList(\backend\models\Message::getUserTypes()) ?>
                <div class="hr-line-dashed"></div>

                <?= $form->field($model, 'level')->radioList(\backend\models\Message::getLevels()) ?>
                <div class="hr-line-dashed"></div>

                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                <div class="hr-line-dashed"></div>

                <?= $form->field($model, 'content')->textarea([]) ?>
                <div class="hr-line-dashed"></div>

                <?= $form->defaultButtons() ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>