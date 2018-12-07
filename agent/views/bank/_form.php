<?php

use agent\models\AgentBank;
use common\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model agent\models\AgentBank */
/* @var $form common\widgets\ActiveForm */
use yii\helpers\Html;
$agent = yii::$app->getUser()->getIdentity();
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

                        <?= Html::activeHiddenInput($model,'agent_id',array('value'=>$agent->getId())) ?>
                        <?= Html::activeHiddenInput($model,'username',array('value'=>$agent->username)) ?>

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


                        <?= $form->field($model, 'card_type')->radioList(AgentBank::getCardTypes()) ?>
                        <div class="hr-line-dashed"></div>


                        <?= $form->field($model, 'status')->radioList(AgentBank::getStatuses()) ?>
                        <div class="hr-line-dashed"></div>

                        <?= $form->defaultButtons() ?>
                    <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>