<?php

use backend\models\ChangeAmountRecord;
use common\grid\ActionColumn;
use common\grid\GridView;
use common\helpers\Util;
use common\widgets\Bar;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ChangeAmountRecordSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '上下分审核';
$this->params['breadcrumbs'][] = '上下分审核';
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

                        ['attribute' => 'id', 'footer' => '合计'],
                        [
                            'attribute' => 'user.username',
                            'format' => 'raw',
                            'value' => function ($model) {
                                if ($model->user)
                                    return Html::a($model->user->username, Url::to(['user/report', 'username' => $model->user->username]), [
                                        'title' => $model->user->username,
                                        'data-pjax' => '0',
                                        'class' => 'openContab',
                                    ]);
                                else
                                    return $model->user_id;
                            }
                        ],

                        ['attribute' => 'switch',
                            'value' => function ($model) {
                                return ChangeAmountRecord::getSwitchs($model->switch);
                            }

                        ],
                        [
                            'attribute' => 'amount',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Util::formatMoney($model->amount, false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['amount'], false) . '</span>'
                        ],
                        [
                            'attribute' => 'after_amount',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Util::formatMoney($model->after_amount, false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['after_amount'], false) . '</span>'
                        ],
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                return ChangeAmountRecord::getStatuses($model->status);
                            }

                        ],
                        'remark',
                        // 'submit_by_id',
                        'submit_by_name',
                        // 'audit_by_id',
                        'audit_by_name',
                        'audit_remark',
                        // 'audit_at',
                        'created_at:date',
                        // 'updated_at',
                        [
                            'class' => ActionColumn::class,
                            'width' => '80',
                            'buttons' => [

                                'audit' => function ($url, $model, $key) {
                                    if ($model->status == ChangeAmountRecord::STATUS_UNCHECKED)
                                        return Html::a('<i class="fa fa-check"></i> 审核', Url::to(['audit', 'id' => $model->id]), [
                                            'title' => '上下分审核',
                                            'data-pjax' => '0',
                                            'class' => 'btn btn-warning btn-sm',
                                        ]);
                                    else
                                        return "";
                                },

                            ],
                            'template' => '{view-layer} {audit}',
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
