<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-25 11:15
 */

/**
 * @var $this yii\web\View
 * @var $model backend\models\User
 */

use backend\models\Agent;
use backend\models\XimaPlan;
use common\widgets\ActiveForm;
use common\libs\Constants;
use backend\models\User;

$this->title = '会员';
?>
<div class="col-sm-12">
    <div class="ibox">
        <?= $this->render('/widgets/_ibox-title') ?>
        <div class="ibox-content">

            <?php $form = ActiveForm::begin([
                'options' => [
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

            <?= $form->field($model, 'password')->textInput(['maxlength' => 512]) ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'invite_agent_id')->dropDownList(Agent::getAgentTreeList(Agent::STATUS_NORMAL), $temp) ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'status')->radioList(User::getStatuses()) ?>
            <div class="hr-line-dashed"></div>
            <?php

            if (yii::$app->controller->action->id == 'update' && $model->invite_agent_id) {
                ?>
                <?= $form->field($model, 'xima_plan_id')->dropDownList(XimaPlan::getPlanItems($model->invite_agent_id, XimaPlan::TYPE_USER)) ?>
                <div class="hr-line-dashed"></div>
                <?php
            }
            /*

            <div class="row">
                <div class="col-sm-4">
                    <?= $form->field($model, 'min_limit',['size'=>6])->label(null,['class'=>'col-sm-6 control-label']) ?>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($model, 'max_limit',['size'=>6])->label(null,['class'=>'col-sm-3 control-label']) ?>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <div class="col-sm-4">
                    <?= $form->field($model, 'dogfall_min_limit',['size'=>6])->label(null,['class'=>'col-sm-6 control-label']) ?>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($model, 'dogfall_max_limit',['size'=>6])->label(null,['class'=>'col-sm-3 control-label']) ?>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <div class="col-sm-4">
                    <?= $form->field($model, 'pair_min_limit',['size'=>6])->label(null,['class'=>'col-sm-6 control-label']) ?>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($model, 'pair_max_limit',['size'=>6])->label(null,['class'=>'col-sm-3 control-label']) ?>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <div class="col-sm-4">
                    <?= $form->field($model, 'xima_status')->radioList(Constants::getYesNoItems())->label(null,['class'=>'col-sm-6 control-label']) ?>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($model, 'xima_type')->radioList(Constants::getXiMaTypes())->label(null,['class'=>'col-sm-3 control-label']) ?>
                </div>
            </div>

            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'xima_rate')->textInput(['afterAddon' => '%','value'=>$model->xima_rate * 100]) ?>
            <div class="hr-line-dashed"></div>
            */
            ?>
            <?= $form->defaultButtons() ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
