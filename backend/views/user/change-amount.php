<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-23 15:47
 */

use backend\models\ChangeAmountRecord;
use backend\models\User;
use common\widgets\ActiveForm;
use common\widgets\JsBlock;
use yii\helpers\Url;
use yii\widgets\DetailView;

$this->params['breadcrumbs'] = [
    ['label' => '会员列表', 'url' => Url::to(['index'])],
    ['label' => '上下分'],
];
/**
 * @var $model backend\models\ChangeAmountRecord
 * @var $userModel backend\models\User
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
                <label class="col-sm-2 control-label">用户名</label>
                <div class="col-sm-10"> <p class="form-control-static"><?=$userModel->username?></p></div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-sm-2 control-label">用户状态</label>
                <div class="col-sm-10"> <p class="form-control-static"><?=User::getStatuses($userModel->status)?></p></div>
            </div>

            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'switch')->radioList(ChangeAmountRecord::getSwitchs()) ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'amount')->textInput(['beforeAddon' => '￥']) ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'available_amount')->label('用户当前额度')->textInput(['beforeAddon' => '￥','readonly'=>'readonly','value'=>(int)$userModel->account->available_amount]) ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'after_amount')->label('用户剩余额度')->textInput(['beforeAddon' => '￥','disabled'=>'disabled']) ?>
            <div class="hr-line-dashed"></div>
            <?= $form->field($model, 'remark')->textarea() ?>
            <div class="hr-line-dashed"></div>

            <?= $form->defaultButtons() ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<?php JsBlock::begin()?>
    <script>

        $(document).ready(function(){
            let available_amount = +$('#changeamountrecord-available_amount').val();
            $('#changeamountrecord-switch input,#changeamountrecord-amount').change(function(){
                let checked = $('#changeamountrecord-switch input:checked').val();
                let amount = available_amount;
                if(checked ==1){
                    amount += +$('#changeamountrecord-amount').val();
                }else if(checked=2){
                    amount -= +$('#changeamountrecord-amount').val();
                }
                $('#changeamountrecord-after_amount').val(amount);
            });
        });


    </script>
<?php JsBlock::end()?>