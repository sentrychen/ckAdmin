<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/7
 * Time: 15:40
 */
use common\widgets\ActiveForm;
use agent\models\AgentWithdraw;
$agentId = yii::$app->getUser()->getIdentity()->getId();
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
                <div >账户可用余额：<?= $agentAccount->available_amount;?>(元)</div>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'apply_amount')->textInput(['maxlength' => true]) ?>
                <div class="hr-line-dashed"></div>

                <?= $form->field($model, 'agent_bank_id')->dropDownList(AgentWithdraw::getAgentBank($agentId),['prompt'=>'请选择银行卡']) ?>
                <div class="hr-line-dashed"></div>

                <?= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>
                <div class="hr-line-dashed"></div>

                <?= $form->defaultButtons() ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>