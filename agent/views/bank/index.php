<?php

use agent\models\AgentBank;
use common\grid\ActionColumn;
use common\grid\CheckboxColumn;
use common\grid\GridView;
use common\widgets\Bar;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CompanyBankSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '银行卡管理';
$this->params['breadcrumbs'][] = '银行卡管理列表';
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <div class="toolbar clearfix">
                    <?= Bar::widget([
                        'template' => '{refresh} {create} ',
                    ]) ?>
                    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
                </div>
                <?= GridView::widget([
                    'id' => 'agentBankGrid',
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'columns' => [
                        //['class' => CheckboxColumn::className()],
                        //'id',
                        //'agent_id',
                        'username',
                        'bank_username',
                        'bank_account',
                        'bank_name',
                        [
                            'attribute' => 'card_type',
                            'value' => function ($model) {
                                $type = AgentBank::getCardTypes();
                                return $type[$model->card_type];
                            }
                        ],
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                $status = AgentBank::getStatuses();
                                return $status[$model->status];
                            }
                        ],
                        [
                            'class' => ActionColumn::class,
                            'buttons' => [
                                 /*
                                'report' => function ($url, $model, $key) {
                                    return Html::a('<i class="fa fa-table"></i> 报表', Url::to(['/deposit/index?UserDepositSearch[pay_channel]='.ThirdPayment::SAVE_PAYMENT_ID]), [
                                        'title' => '第三方支付报表',
                                        'data-pjax' => '0',
                                        'class' => 'btn btn-info btn-sm openContab',
                                    ]);
                                },
                                 */
                                'delete-bank' => function ($url, $model, $key) {
                                    return Html::a('<i class="glyphicon glyphicon-trash"></i> 删除', Url::to(['delete-bank','id'=>$model->id]), [
                                        'title' => '删除',
                                        'data-pjax' => '0',
                                        'class' => 'btn btn-danger btn-sm',
                                    ]);
                                },
                            ],
                            'template' => '{view-layer} {delete-bank}',// {update}
                        ],
                    ],

                ]); ?>
            </div>
        </div>
    </div>
</div>
