<?php

use backend\models\GameType;
use backend\models\Platform;
use backend\models\PlatformGame;
use common\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PlatformGame */
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
                <?= $form->field($model, 'platform_id')->dropDownList(Platform::getPlatformNames()) ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'game_type_id')->dropDownList(GameType::getTypeNames()) ?>
                <div class="hr-line-dashed"></div>

                <?= $form->field($model, 'game_name')->textInput(['maxlength' => true]) ?>
                <div class="hr-line-dashed"></div>

                <?= $form->field($model, 'game_name_en')->textInput(['maxlength' => true]) ?>
                <div class="hr-line-dashed"></div>

                <?= $form->field($model, 'game_icon_url')->imgInput(['style' => "max-width:200px;max-height:150px"]); ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'status')->radioList(PlatformGame::getStatuses()) ?>
                <div class="hr-line-dashed"></div>

                <?= $form->defaultButtons() ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>