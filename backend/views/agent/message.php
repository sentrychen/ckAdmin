<?php

use backend\models\Message;
use common\widgets\ActiveForm;
use common\widgets\JsBlock;

/* @var $this yii\web\View */
/* @var $model backend\models\Message */
/* @var $form common\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox-content">
            <?php $form = ActiveForm::begin([
                'action' => ['message', 'ids' => $model->ids],
                'options' => [
                    'class' => 'form-horizontal'
                ],
                'fieldConfig' => ['size' => 10],
            ]); ?>

            <div class="form-group">
                <label class="col-sm-2 control-label">发送给</label>
                <div class="col-sm-10"><p class="form-control-static"><?= implode(',', $model->getUserNames()) ?></p>
                </div>
            </div>

            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'level')->radioList(Message::getLevels()) ?>
            <div class="hr-line-dashed"></div>

            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            <div class="hr-line-dashed"></div>

            <?= $form->field($model, 'content')->textarea() ?>
            <div class="hr-line-dashed"></div>

            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">
                    <button class="btn btn-primary" type="submit">发送</button>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>