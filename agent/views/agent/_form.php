<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-25 11:15
 */

/**
 * @var $this yii\web\View
 * @var $model backend\models\AdminUser
 */

use common\widgets\ActiveForm;
use common\libs\Constants;
use backend\models\Agent;

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
            $model->xima_rate *= 100;
            $model->rebate_rate *= 100;
            $temp = ['maxlength' => 64];
            if (yii::$app->controller->action->id == 'update') {
                $temp['disabled'] = 'disabled';
            }
            ?>
            <?= $form->field($model, 'username')->textInput($temp) ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'realname') ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'password')->passwordInput(['maxlength' => 512]) ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'repassword')->passwordInput(['maxlength' => 512]) ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'status')->radioList(Agent::getStatuses()) ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'sub_permission')->radioList(Constants::getYesNoItems()) ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'rebate_rate')->textInput(['afterAddon' => '%']) ?>
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
