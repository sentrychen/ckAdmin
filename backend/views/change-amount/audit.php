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
use backend\models\UserWithdraw;
use common\models\CompanyBank;
use common\widgets\ActiveForm;
use common\widgets\JsBlock;
use yii\helpers\Url;
use yii\widgets\DetailView;

$this->params['breadcrumbs'] = [
    ['label' => '上下分申请列表', 'url' => Url::to(['index'])],
    ['label' => '上下分审核'],
];
/**
 * @var $model backend\models\ChangeAmountRecord
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
                <label class="col-sm-2 control-label">提交者名称</label>
                <div class="col-sm-10"><p class="form-control-static"><?= $model->submit_by_name ?></p></div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-2 control-label">提交时间</label>
                <div class="col-sm-10"><p
                            class="form-control-static"><?= yii::$app->formatter->asDate($model->created_at) ?></p>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-2 control-label">提交备注</label>
                <div class="col-sm-10"><p class="form-control-static"><?= $model->remark ?></p></div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-2 control-label">上下分</label>
                <div class="col-sm-10"><p
                            class="form-control-static"><?= ChangeAmountRecord::getSwitchs($model->switch) ?></p></div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-2 control-label">提交金额</label>
                <div class="col-sm-10"><p
                            class="form-control-static"><?= yii::$app->formatter->asCurrency($model->amount) ?></p>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-2 control-label">用户余额</label>
                <div class="col-sm-10"><p
                            class="form-control-static"><?= yii::$app->formatter->asCurrency($model->after_amount) ?></p>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-2 control-label">用户冻结金额</label>
                <div class="col-sm-10"><p
                            class="form-control-static"><?= yii::$app->formatter->asCurrency($model->user->account->frozen_amount) ?></p>
                </div>
            </div>
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