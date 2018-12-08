<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-23 17:51
 */

/**
 * @var $this yii\web\View
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $searchModel backend\models\search\UserWithdrawSearch
 * @var $total array
 */

use agent\models\AgentWithdraw;
use common\widgets\Bar;
use common\grid\{
    CheckboxColumn, ActionColumn, DateColumn, GridView
};
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <div class="toolbar clearfix">
                    <?= Bar::widget([
                        'template' => '{refresh}{add}',
                        'buttons' => [
                            'add' => function () {
                                return Html::a('申请取款', Url::to(['add']), [
                                    'title' => '申请取款',
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

                        [
                            'attribute' => 'id',
                        ],
                        [
                            'attribute' => 'agent.username',
                        ],
                        [
                            'attribute' => 'apply_amount',
                            'format' => 'currency',
                        ],
                        [
                            'attribute' => 'transfer_amount',
                            'format' => 'currency',
                        ],
                        [
                            'attribute' => 'agent.account.frozen_amount',
                            'format' => 'currency',
                        ],
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                return AgentWithdraw::getStatuses($model->status);
                            }
                        ],

                        [
                            'attribute' => 'audit_by_username',
                        ],
                        [
                            'attribute' => 'audit_remark',
                        ],

                        [
                            'class' => DateColumn::class,
                            'attribute' => 'created_at'

                        ],
                        [
                            'class' => ActionColumn::class,
                            'width' => '80',
                            'buttons' => [

                                'audit' => function ($url, $model, $key) {
                                    if ($model->status == AgentWithdraw::STATUS_UNCHECKED)
                                        return Html::a('<i class="fa fa-check"></i> 审核', Url::to(['audit', 'id' => $model->id]), [
                                            'title' => '存款审核',
                                            'data-pjax' => '0',
                                            'class' => 'btn btn-warning btn-sm',
                                        ]);
                                    else
                                        return "";
                                },

                    ],
                            'template' => '{view-layer}',
                        ],
                    ]
                ]); ?>
    </div>
</div>