<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-03-15 21:16
 */

/**
 * @var $this \yii\web\View
 * @var $model common\models\Options
 */

use common\widgets\ActiveForm;
use common\libs\Constants;

$this->title = '代理设置';
$this->params['breadcrumbs'][] = '代理设置';
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox float-e-margins">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'agent_status')->dropDownList(Constants::getAgentStatusItems()) ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'agent_default_code') ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'agent_max_level') ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'agent_max_rebate')->textInput(['afterAddon' => '%','value'=>$model->agent_max_rebate * 100]) ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'agent_default_rebate')->textInput(['afterAddon' => '%','value'=>$model->agent_default_rebate * 100]) ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'agent_xima_status')->radioList(Constants::getYesNoItems()) ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'agent_xima_type')->radioList(Constants::getXimaTypes()) ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'agent_xima_rate')->textInput(['afterAddon' => '%','value'=>$model->agent_xima_rate * 100]) ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'agent_change_amount')->radioList(Constants::getYesNoItems()) ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'agent_backend_url') ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'agent_user_reg_url') ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'agent_reg_url') ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'agent_apk_url') ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'agent_ios_url') ?>
                <div class="hr-line-dashed"></div>
                <?= $form->defaultButtons() ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
