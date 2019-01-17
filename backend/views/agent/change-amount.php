<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-23 15:47
 */

use backend\models\Agent;
use backend\models\AgentAccountRecord;
use common\widgets\ActiveForm;
use common\widgets\JsBlock;
use yii\helpers\Url;
use yii\widgets\DetailView;

$this->params['breadcrumbs'] = [
    ['label' => '代理列表', 'url' => Url::to(['index'])],
    ['label' => '上下分'],
];
/**
 * @var $model backend\models\AgentAccountRecord
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
                    <label class="col-sm-2 control-label">代理名</label>
                    <div class="col-sm-10"><p class="form-control-static"><?= $model->agent->username ?></p></div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">代理状态</label>
                    <div class="col-sm-10"><p
                                class="form-control-static"><?= Agent::getStatuses($model->agent->status) ?></p></div>
                </div>

                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'switch')->radioList(AgentAccountRecord::getSwitchStatus()) ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'amount')->textInput(['beforeAddon' => '￥']) ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'available_amount')->label('代理当前额度')->textInput(['beforeAddon' => '￥', 'readonly' => 'readonly', 'value' => (int)$model->agent->account->available_amount]) ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'after_amount')->label('交易后余额')->textInput(['beforeAddon' => '￥', 'readonly' => 'readonly']) ?>
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
            let available_amount = +$('#agentaccountrecord-available_amount').val();
            $('#agentaccountrecord-switch input,#agentaccountrecord-amount').change(function () {
                let checked = $('#agentaccountrecord-switch input:checked').val();
                let amount = available_amount;
                if (checked == 1) {
                    amount += +$('#agentaccountrecord-amount').val();
                } else if (checked = 2) {
                    amount -= +$('#agentaccountrecord-amount').val();
                }
                $('#agentaccountrecord-after_amount').val(amount);
            });
        });


    </script>
<?php JsBlock::end() ?>