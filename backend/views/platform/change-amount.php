<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-23 15:47
 */

use backend\models\PlatformAccountRecord;
use common\widgets\ActiveForm;
use common\widgets\JsBlock;
use yii\helpers\Url;

$this->params['breadcrumbs'] = [
    ['label' => '平台资金', 'url' => Url::to(['amount'])],
    ['label' => '额度调整'],
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
                    <div class="col-sm-10"><p class="form-control-static"><?= $platformModel->name ?></p></div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">游戏平台代号</label>
                    <div class="col-sm-10"><p class="form-control-static"><?= $platformModel->code ?></p></div>
                </div>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'switch')->radioList(PlatformAccountRecord::getSwitchs()) ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'amount')->label('调整额度')->textInput(['beforeAddon' => '￥']) ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'available_amount')->label('调整前额度')->textInput(['beforeAddon' => '￥', 'readonly' => 'readonly', 'value' => (int)$platformModel->account->available_amount]) ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'after_amount')->label('调整后额度')->textInput(['beforeAddon' => '￥', 'disabled' => 'disabled']) ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'remark')->textarea() ?>
                <div class="hr-line-dashed"></div>

                <?= $form->defaultButtons() ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
<?php JsBlock::begin() ?>
    <script>

        $(document).ready(function () {
            let available_amount = +$('#platformaccountrecord-available_amount').val();
            $('#platformaccountrecord-switch input,#platformaccountrecord-amount').change(function () {
                let checked = $('#platformaccountrecord-switch input:checked').val();
                let amount = available_amount;
                if (checked == 1) {
                    amount += +$('#platformaccountrecord-amount').val();
                } else if (checked = 2) {
                    amount -= +$('#platformaccountrecord-amount').val();
                }
                $('#platformaccountrecord-after_amount').val(amount);
            });
        });


    </script>
<?php JsBlock::end() ?>