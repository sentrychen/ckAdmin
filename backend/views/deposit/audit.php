<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-23 15:47
 */

use backend\models\ChangeAmountRecord;
use backend\models\User;
use backend\models\UserDeposit;
use common\models\CompanyBank;
use common\widgets\ActiveForm;
use common\widgets\JsBlock;
use yii\helpers\Url;
use yii\widgets\DetailView;

$this->params['breadcrumbs'] = [
    ['label' => '会员存款申请列表', 'url' => Url::to(['index'])],
    ['label' => '存款审核'],
];
/**
 * @var $model backend\models\UserDeposit
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
                    <label class="col-sm-2 control-label">单号</label>
                    <div class="col-sm-10"><p class="form-control-static"><?= $model->id ?></p></div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">会员名称</label>
                    <div class="col-sm-10"><p class="form-control-static"><?= $model->user->username ?></p></div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">申请时间</label>
                    <div class="col-sm-10"><p
                                class="form-control-static"><?= yii::$app->formatter->asDate($model->created_at) ?></p>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">存款金额</label>
                    <div class="col-sm-10"><p
                                class="form-control-static"><?= yii::$app->formatter->asCurrency($model->apply_amount) ?></p>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">支付渠道</label>
                    <div class="col-sm-10"><p
                                class="form-control-static"><?= UserDeposit::getPayChannels($model->pay_channel) ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">支付账号</label>
                    <div class="col-sm-10"><p class="form-control-static"><?= $model->pay_username ?></p></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">支付用户昵称</label>
                    <div class="col-sm-10"><p class="form-control-static"><?= $model->pay_nickname ?></p></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">支付信息</label>
                    <div class="col-sm-10"><p class="form-control-static"><?= $model->pay_info ?></p></div>
                </div>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'status')->radioList([UserDeposit::STATUS_CHECKED => '通过', UserDeposit::STATUS_CANCLED => '取消']) ?>

                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'confirm_amount')->textInput(['beforeAddon' => '￥']) ?>

                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'save_bank_id')->label('存入银行')->dropDownList(CompanyBank::getBanks()) ?>

                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'audit_remark')->label('备注')->textarea() ?>
                <div class="hr-line-dashed"></div>

                <?= $form->defaultButtons() ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
<?php JsBlock::begin() ?>
    <script>

        $(document).ready(function () {
            var apply_amount = parseInt(<?=$model->apply_amount?>);

            $('#userdeposit-status input').change(function () {
                let checked = $('#userdeposit-status input:checked').val();
                if (checked == 2) {
                    $('#userdeposit-save_bank_id').attr('disabled', false);
                    $('#userdeposit-confirm_amount').attr('disabled', false);
                    $('#userdeposit-confirm_amount').val(apply_amount);
                } else {
                    $('#userdeposit-save_bank_id').attr('disabled', 'disabled');
                    $('#userdeposit-confirm_amount').attr('disabled', 'disabled');
                    $('#userdeposit-confirm_amount').val('');
                }

            });
        });


    </script>
<?php JsBlock::end() ?>