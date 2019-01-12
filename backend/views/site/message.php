<?php

use backend\models\Message;
use common\libs\Constants;
use common\widgets\Bar;
use common\grid\{
    CheckboxColumn, ActionColumn, GridView
};
use common\widgets\JsBlock;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MessageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '站内消息';
$this->params['breadcrumbs'][] = '站内消息';
?>
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <?= $this->render('/widgets/_ibox-title') ?>
                <div class="ibox-content">
                    <div class="toolbar clearfix">
                        <?= Bar::widget([
                            'template' => '{refresh} {delete}',
                            'buttons' => [
                                'delete' => function () {
                                    return Html::a('<i class="fa fa-trash-o"></i> 删除', Url::to(['delete-message']), [
                                        'title' => '删除所选消息',
                                        'data-pjax' => '0',
                                        'data-confirm' => '你确定要删除这些消息吗？',
                                        'class' => 'btn btn-danger btn-sm multi-operate',
                                    ]);
                                },
                            ]
                        ]) ?>
                        <?= $this->render('_search-message', ['model' => $searchModel]); ?>
                    </div>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => null,
                        'columns' => [
                            ['class' => CheckboxColumn::className()],

                            [
                                'attribute' => 'title',
                                'format' => 'raw',
                                'width' => '15%',
                                'value' => function ($model) {

                                    $html = "<a href='javascript:void(0);' onclick='showMessage(" . $model->id . ")'>" . $model->title . "</a>";
                                    if ($model->is_read != 1) {
                                        $html = '<strong>' . $html . '</strong>';
                                    }
                                    return $html;
                                }
                            ],
                            [
                                'attribute' => 'content',
                                'format' => 'raw',
                                'width' => '30%',
                            ],
                            [
                                'attribute' => 'level',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    $class = ['info', 'info', 'warning', 'danger'];
                                    return '<span class="badge label-' . ($class[$model->level] ?? 'info') . '">' . Message::getLevels($model->level) . '</span>';
                                }
                            ],

                            'sender_name',
                            // 'updated_at',
                            'created_at:date',

                            ['class' => ActionColumn::className(),
                                'width' => '120',
                                'template' => '{delete}',
                                'buttons' => [
                                    'delete' => function ($url, $model) {
                                        return Html::a('<i class="fa fa-trash-o"></i> 删除', Url::to(['delete-message', 'ids' => $model->id]), [
                                            'title' => '删除所选消息',
                                            'data-pjax' => '0',
                                            'data-confirm' => '你确定要删除吗？',
                                            'class' => 'btn btn-danger btn-sm',
                                        ]);
                                    },
                                ]
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
<?php JsBlock::begin() ?>
    <script>
        function showMessage(id) {
            layer.open({
                type: 2,
                title: null,
                shadeClose: true,
                shade: 0.8,
                content: "<?=Url::to(['message-info'])?>?id=" + id
            });
        }

    </script>
<?php JsBlock::end() ?>