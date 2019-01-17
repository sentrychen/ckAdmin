<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-23 15:47
 */

use agent\models\User;
use agent\models\UserAccountRecord;
use backend\models\Agent;
use backend\models\AgentAccountRecord;
use common\widgets\ActiveForm;
use common\widgets\JsBlock;
use yii\helpers\Url;
use yii\widgets\DetailView;

$this->params['breadcrumbs'] = [
    ['label' => '会员列表', 'url' => Url::to(['index'])],
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
                    <label class="col-sm-2 control-label">会员名</label>
                    <div class="col-sm-10"><p class="form-control-static"><?= $model->user->username ?></p></div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">会员状态</label>
                    <div class="col-sm-10"><p
                                class="form-control-static"><?= User::getStatuses($model->user->status) ?></p></div>
                </div>

                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'switch')->radioList(UserAccountRecord::getSwitchStatus()) ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'amount')->textInput(['beforeAddon' => '￥']) ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'available_amount')->label('会员当前额度')->textInput(['beforeAddon' => '￥', 'readonly' => 'readonly', 'value' => (int)$model->user->account->available_amount]) ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'available_amount')->label('代理当前额度')->textInput(['beforeAddon' => '￥', 'readonly' => 'readonly', 'value' => (int)yii::$app->getUser()->getIdentity()->account->available_amount]) ?>
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
            let available_amount = +$('#useraccountrecord-available_amount').val();
            $('#useraccountrecord-switch input,#useraccountrecord-amount').change(function () {
                let checked = $('#useraccountrecord-switch input:checked').val();
                let amount = available_amount;
                if (checked == 1) {
                    amount += +$('#useraccountrecord-amount').val();
                } else if (checked = 2) {
                    amount -= +$('#useraccountrecord-amount').val();
                }
                $('#useraccountrecord-after_amount').val(amount);
            });
        });


    </script>
<?php JsBlock::end() ?>