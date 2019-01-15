<?php

use common\widgets\JsBlock;
use yii\widgets\DetailView;


$this->title = '消息发送成功';

?>
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <h1 class="text-warning">消息发送成功</h1>
                <div class="ibox-content" style="height:340px;">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            [
                                'label' => '发送给',
                                'value' => function ($model) {
                                    return implode(',', $model->getUsernames());
                                }
                            ],
                            'title',
                            'content',
                            'created_at:date'
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
        <div class="col-sm-12 text-center">
            <button class="btn btn-warning" type="button" onclick="closeWindow()">关闭</button>
        </div>
    </div>
<?php JsBlock::begin() ?>
    <script type="text/javascript">
        function closeWindow() {
            var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
            console.log(index);
            parent.layer.close(index); //再执行关闭
        }

        setInterval(closeWindow, 5000);
    </script>
<?php JsBlock::end() ?>