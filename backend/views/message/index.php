<?php

use backend\models\Message;
use common\widgets\Bar;
use common\grid\{
    CheckboxColumn, ActionColumn, GridView
};
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
                        'template' => '{refresh} {delete} {group}',
                        'buttons' => [
                            'group' => function () {
                                return Html::a('<i class="fa fa-send"></i> 群发消息', Url::to(['group']), [
                                    'title' => '群发消息',
                                    'data-pjax' => '0',
                                    'class' => 'btn btn-primary btn-sm',
                                ]);
                            },
                        ]
                    ]) ?>
                    <?= $this->render('_search', ['model' => $searchModel]); ?>
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
                        ],
                        [
                            'attribute' => 'content',
                            'format' => 'raw',
                            'width' => '30%',
                        ],
                        //'is_canceled',
                        //'canceled_at',
                        // 'is_deleted',
                        // 'deleted_at',
                        [
                            'attribute' => 'level',
                            'format' => 'raw',
                            'value' => function ($model) {
                                $class = ['info', 'info', 'warning', 'danger'];
                                return '<span class="badge label-' . ($class[$model->level] ?? 'info') . '">' . Message::getLevels($model->level) . '</span>';
                            }
                        ],
                        [
                            'attribute' => 'user_type',
                            'value' => function ($model) {

                                return Message::getUserTypes($model->user_type);
                            }
                        ],
                        [
                            'attribute' => 'notify_obj',
                            'value' => function ($model) {

                                return Message::getNotifyObjs($model->notify_obj);
                            }
                        ],
                        // 'user_group',
                        // 'sender_id',
                        'sender_name',
                        // 'updated_at',
                        'created_at:date',

                        ['class' => ActionColumn::className(),
                            'width' => '120',
                            'template' => '{view-layer} {delete}'
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
