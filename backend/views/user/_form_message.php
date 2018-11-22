<?php

use common\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Message */
/* @var $form common\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <div class="ibox-content">
                <?php $form = ActiveForm::begin([
                    'action' => ['send-message'],//提交地址(*可省略*)
                    'method'=>'post',  //提交方法(*可省略默认POST*)
                    'id' => 'form-save', //设置ID属性
                    'options' => [
                        'class' => 'form-horizontal'
                    ],
                    'enableAjaxValidation' => true
                ]); ?>

                <?= $form->field($model, 'level')->radioList(\backend\models\Message::getLevels()) ?>

                <div class="hr-line-dashed"></div>

                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                <div class="hr-line-dashed"></div>

                <?= $form->field($model, 'content')->textarea([]) ?>
                <div class="hr-line-dashed"></div>
                <input id="userId" type="hidden" name="user_id" value="<?php echo $id_str;?>" />
                <?= $form->defaultButtons() ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
<style>
    #form-save .col-sm-2{width:100px;}
    #form-save .col-sm-5{width: 380px;}
</style>
<script src="/admin/assets/3291a725/jquery.js"></script>
<script>
    $(function(){
        $(document).on('beforeSubmit', 'form#form-save', function () {
            var form = $(this);
            var userIds = $('#userId').val();
            var level = $("input[name='Message[level]']:checked").val();
            var title = $('#message-title').val();
            var content = $('#message-content').val();

            var data_obj = {
                'ids_str': userIds,
                'level': level,
                'title': title,
                'content':content
            };
            //返回错误的表单信息
            if (form.find('.has-error').length) {
                return false;
            }
            //表单提交
            $.ajax({
                url: form.attr('action'),
                type: 'post',
                data: data_obj,
                success: function (response) {
                    if (response) {
                        layer.alert('发送消息成功！',{icon:1} ,function(index){
                            window.location.reload();
                            //layer.close(index);
                        });
                    }else{
                        layer.alert('发送消息失败',{icon:1});
                    }
                },
                error: function () {
                    layer.alert('发送失败');
                    return false;
                }
            });
            return false;
        });
    });
</script>