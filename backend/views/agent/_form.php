<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-25 11:15
 */

/**
 * @var $this yii\web\View
 * @var $model backend\models\Agent
 */

use backend\models\Agent;
use backend\models\RebatePlan;
use backend\models\XimaPlan;
use common\widgets\ActiveForm;
use common\libs\Constants;
use yii\helpers\ArrayHelper;

$this->title = '代理管理';
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
            <?= $form->field($model, 'realname') ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'parent_id')->label('上级代理')->dropDownList(Agent::getAgentTreeList(AGENT::STATUS_NORMAL, 0,yii::$app->option->agent_max_level), $temp) ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'password')->textInput(['maxlength' => 512]) ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'status')->radioList(Agent::getStatuses()) ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'sub_permission')->radioList(Constants::getYesNoItems()) ?>
            <div class="hr-line-dashed"></div>
            <?php
            if (yii::$app->controller->action->id == 'update') {
                ?>
                <?= $form->field($model, 'rebate_plan_id')->dropDownList(RebatePlan::getPlanItems($model->id)) ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'xima_plan_id')->dropDownList(XimaPlan::getPlanItems($model->id, XimaPlan::TYPE_AGENT)) ?>
                <div class="hr-line-dashed"></div>
                <?php
            }
            /*

            <?= $form->field($model, 'rebate_rate')->textInput(['afterAddon' => '%']) ?>
            <div class="hr-line-dashed"></div>
            <?php
            if (yii::$app->option->agent_xima_status == 1) {

                ?>
                <?= $form->field($model, 'xima_status')->radioList(Constants::getYesNoItems()) ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'xima_type')->radioList(Constants::getXiMaTypes(),['options'=>['readOnly'=>'readOnly']]) ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'xima_rate')->textInput(['afterAddon' => '%']) ?>
                <div class="hr-line-dashed"></div>
                <?php
            }
*/
            ?>
            <?= $form->defaultButtons() ?>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
