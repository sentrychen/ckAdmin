<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-23 15:47
 */

use backend\models\UserWithdraw;
use common\helpers\Util;
use common\widgets\ActiveForm;
use common\widgets\JsBlock;
use yii\helpers\Url;
use yii\widgets\DetailView;

$this->params['breadcrumbs'] = [
    ['label' => '会员取款申请列表', 'url' => Url::to(['index'])],
    ['label' => '取款审核'],
];
/**
 * @var $model backend\models\UserWithdraw
 */
?>

    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">

                <?php $form = ActiveForm::begin([]); ?>
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
                    <label class="col-sm-2 control-label">收款银行信息</label>
                    <div class="col-sm-5">
                        <?= DetailView::widget([
                            'model' => $model->bank,
                            'attributes' => [
                                'bank_username',
                                'bank_account',
                                'bank_name',
                                'province',
                                'city',
                                'branch_name'
                            ]
                        ]) ?>
                    </div>
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
                    <label class="col-sm-2 control-label">申请取款金额</label>
                    <div class="col-sm-10"><p
                                class="form-control-static"><?= Util::formatMoney($model->apply_amount) ?></p>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">用户冻结金额</label>
                    <div class="col-sm-10"><p
                                class="form-control-static"><?= Util::formatMoney($model->user->account->frozen_amount) ?></p>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">免费额度</label>
                    <div class="col-sm-10"><p
                                class="form-control-static"><?= Util::formatMoney($model->free_amount) ?></p>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">超额扣费率</label>
                    <div class="col-sm-10"><p
                                class="form-control-static"><?= yii::$app->formatter->asPercent($model->withdraw_rate, 2) ?></p>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">应出款金额</label>
                    <div class="col-sm-10"><p
                                class="form-control-static">申请金额 - 超额扣费率 x (申请金额 - 免费额度)
                            = <?= (float)$model->transferAmount() ?></p>
                    </div>
                </div>

                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'transfer_amount')->label('实出款金额')->textInput(['beforeAddon' => '￥', 'value' => (float)$model->transferAmount()]) ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'status')->radioList([UserWithdraw::STATUS_CHECKED => '通过', UserWithdraw::STATUS_CANCLED => '取消']) ?>


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
            var apply_amount = '<?=(float)$model->transferAmount()?>';

            $('#userwithdraw-status input').change(function () {
                let checked = $('#userwithdraw-status input:checked').val();
                if (checked == 2) {
                    $('#userwithdraw-transfer_amount').attr('disabled', false);
                    $('#userwithdraw-transfer_amount').val(apply_amount);
                } else {
                    $('#userwithdraw-transfer_amount').attr('disabled', 'disabled');
                    $('#userwithdraw-transfer_amount').val('');
                }

            });
        });


    </script>
<?php JsBlock::end() ?>