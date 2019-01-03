<?php

use common\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Message */
/* @var $form common\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <div class="ibox-content">
                <?php $form = ActiveForm::begin([
                    'action' => ['reset-pwd'],//提交地址(*可省略*)
                    'method'=>'post',  //提交方法(*可省略默认POST*)
                    'id' => 'form-save', //设置ID属性
                    'options' => [
                        'class' => 'form-horizontal'
                    ],
                    'enableAjaxValidation' => true
                ]); ?>

                <div class="hr-line-dashed"></div>

                <?= $form->field($model, 'new_password')->textInput(['maxlength' => 512]) ?>
                <div class="hr-line-dashed"></div>
                <input id="userId" type="hidden" name="user_id" value="<?= $model->id;?>" />
                <?= $form->defaultButtons() ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
