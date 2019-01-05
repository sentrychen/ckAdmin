<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-23 15:47
 */

use common\widgets\ActiveForm;
use yii\helpers\Url;

$this->params['breadcrumbs'] = [
    ['label' => '平台资金', 'url' => Url::to(['amount'])],
    ['label' => '告警设置'],
];
/**
 * @var $model backend\models\PlatformAccountRecord
 * @var $platformModel backend\models\Platform
 */
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

            <div class="form-group">
                <label class="col-sm-2 control-label">游戏平台名称</label>
                <div class="col-sm-10"><p class="form-control-static"><?= $model->platform->name ?></p></div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-2 control-label">游戏平台代号</label>
                <div class="col-sm-10"><p class="form-control-static"><?= $model->platform->code ?></p></div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-2 control-label">游戏平台余额</label>
                <div class="col-sm-10"><p
                            class="form-control-static"><?= \common\helpers\Util::formatMoney($model->available_amount) ?></p>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'alarm_amount')->label('告警金额')->textInput(['beforeAddon' => '￥'])->hint('当平台资金低于此额度时，将向管理员发出告警通知') ?>
            <div class="hr-line-dashed"></div>
            <?= $form->defaultButtons() ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
