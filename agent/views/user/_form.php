<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-25 11:15
 */

/**
 * @var $this yii\web\View
 * @var $model agent\models\User
 */

use backend\widgets\ActiveForm;
use backend\models\AdminUser;
use common\libs\Constants;

$this->title = 'AdminUser';
?>
<div class="col-sm-12">
    <div class="ibox">
        <?= $this->render('/widgets/_ibox-title') ?>
        <div class="ibox-content">

            <?php $form = ActiveForm::begin([
                'options' => [
                    'enctype' => 'multipart/form-data',
                    'class' => 'form-horizontal'
                ]
            ]); ?>
            <?php

            $temp = ['maxlength' => 64];

            if (yii::$app->controller->action->id == 'update') {
                $temp['disabled'] = 'disabled';
            }
            ?>
            <?= $form->field($model, 'username')->textInput($temp) ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'password')->passwordInput(['maxlength' => 512]) ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'repassword')->passwordInput(['maxlength' => 512]) ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'status')->radioList(AdminUser::getStatuses()) ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'min_limit') ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'max_limit') ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'dogfall_min_limit') ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'dogfall_max_limit') ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'pair_min_limit') ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'pair_max_limit') ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'xima_status')->radioList(Constants::getYesNoItems()) ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'xima_type')->radioList(Constants::getXiMaTypes()) ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'xima_rate')->textInput(['afterAddon' => '%']) ?>
            <div class="hr-line-dashed"></div>
            <?= $form->defaultButtons() ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
