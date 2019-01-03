<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/7
 * Time: 15:40
 */
use common\widgets\ActiveForm;
use agent\models\AgentWithdraw;
use common\widgets\JsBlock;
$agentId = yii::$app->getUser()->getIdentity()->getId();
/* @var $this yii\web\View */
/* @var $model agent\models\AgentWithdraw */
/* @var $form common\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <?php $form = ActiveForm::begin([
                    'options' => [
                        'class' => 'form-horizontal',
                        //'onsubmit'=>'return checkForm()'
                    ]
                ]); ?>
                <div class="hr-line-dashed"></div>

                <div class="form-group">
                    <label class="col-sm-2 control-label"> 账户可用余额</label>
                    <div class="col-sm-5">
                        <h1 style="color: #1ab394"><?= \common\helpers\Util::formatMoney($available_amount) ?></h1>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>

                <?= $form->field($model, 'apply_amount')->textInput(['maxlength' => true]) ?>
                <div class="hr-line-dashed"></div>

                <input type="hidden" id="available_amount" name="available_amount" value="<?= $available_amount ?>">

                <?= $form->field($model, 'agent_bank_id')->dropDownList(AgentWithdraw::getAgentBank($agentId),['prompt'=>'请选择银行卡']) ?>
                <div class="hr-line-dashed"></div>

                <?= $form->field($model, 'remark')->textarea([]) ?>
                <div class="hr-line-dashed"></div>

                <?= $form->defaultButtons() ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

<?php JsBlock::begin() ?>
<script>
    $(document).ready(function () {
        $('#agentwithdraw-apply_amount').blur(function(){
            var hasMoney = parseFloat($('#available_amount').val());
            var appMoney = parseFloat($('#agentwithdraw-apply_amount').val());
            if(appMoney>hasMoney){
                layer.alert('取款金额不能大于账户可用余额！');
                $('.btn-primary').after("<input type='submit' class='btn sub-primary' disabled='disabled' value='保存'>");
                $('.btn-primary').remove();
                $('#agentwithdraw-apply_amount').css('border','1px solid #ff3300')
                $('.sub-primay').attr('disable',true);
                return false;
            }else {
                if($('sub-primary').val()!=''){
                    $('.sub-primary').after("<button class='btn btn-primary' type='submit'>保存</button>");
                    $('#agentwithdraw-apply_amount').removeAttr('style');
                    $('.sub-primary').remove();
                }
            }
        });
    });
</script>
<?php JsBlock::end() ?>