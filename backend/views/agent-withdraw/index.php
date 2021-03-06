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

use backend\models\AgentWithdraw;
use common\widgets\Bar;
use common\grid\{
    CheckboxColumn, ActionColumn, DateColumn, GridView
};
use yii\helpers\Html;
use yii\helpers\Url;
use common\helpers\Util;
?>

<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <div class="toolbar clearfix">
                    <?= Bar::widget([
                        'template' => '{refresh}',
                    ]) ?>
                    <?= $this->render('_search', ['model' => $searchModel]); ?>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'showFooter' => true,
                    'footerRowOptions' => ['style' => 'font-weight:bold;'],
                    'columns' => [

                        [
                            'attribute' => 'id',
                            'footer' => '合计',
                        ],
                        [
                            'attribute' => 'agent.username',
                            'format' => 'raw',
                            'value' => function ($model) {
                                if (!$model->agent) return '';
                                return Html::a($model->agent->username, Url::to(['agent/view', 'id' => $model->agent->id]), [
                                    'title' => $model->agent->username,
                                    'data-pjax' => '0',
                                    'class' => 'openContab',
                                ]);
                            }
                        ],
                        [
                            'attribute' => 'apply_amount',
                            'format' => 'raw',
                            'value' => function($model){
                                return Util::formatMoney($model->apply_amount,false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['apply_amount'], false) . '</span>'
                        ],
                        [
                            'attribute' => 'transfer_amount',
                            'format' => 'raw',
                            'value' => function($model){
                                return Util::formatMoney($model->transfer_amount,false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['transfer_amount'], false) . '</span>'
                        ],
                        [
                            'label' => '冻结金额',
                            'format' => 'raw',
                            'value' => function($model){
                                if ($model->agent && $model->agent->account)
                                    return Util::formatMoney($model->agent->account->frozen_amount, false);
                                else
                                    return 0;
                            },

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
                            'template' => '{view-layer}{audit}',
                        ],
                    ]
                ]); ?>
    </div>
</div>
