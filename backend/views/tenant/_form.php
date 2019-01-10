<?php

use backend\models\Agent;
use common\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Tenant */
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
                ]);
                $temp = [];
                if (yii::$app->controller->action->id == 'update') {
                    $temp['disabled'] = 'disabled';
                }
                ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'agent_id')->dropDownList(\yii\helpers\ArrayHelper::map(Agent::find()->where(['parent_id' => 0, 'status' => Agent::STATUS_NORMAL])->asArray()->all(), 'id', 'username'), $temp) ?>

                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                <div class="hr-line-dashed"></div>

                <?= $form->field($model, 'app_name')->textInput(['maxlength' => true]) ?>
                <div class="hr-line-dashed"></div>

                <?= $form->field($model, 'app_logo')->imgInput(['style' => "max-width:200px;max-height:150px"]); ?>
                <div class="hr-line-dashed"></div>



                <?= $form->defaultButtons() ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>