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
 * @var $searchModel backend\models\search\UserSearch
 */

use backend\models\User;
use common\grid\ActionColumn;
use common\grid\CheckboxColumn;
use common\grid\DateColumn;
use common\grid\GridView;
use common\widgets\Bar;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Users';
$this->params['breadcrumbs'][] = '会员列表';

?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">

                <div class="toolbar clearfix">
                    <?= Bar::widget([
                        'template' => '{refresh} {create} {message}',
                        'buttons' => [
                            'message' => function () {
                                return Html::a('<i class="fa fa-send"></i> 发消息', 'javascript:void(0)', [
                                    'data-title' => '给选中用户发消息',
                                    'data-pjax' => '0',
                                    'data-confirm' => null,
                                    'onclick' => "if ($('#userGrid').yiiGridView('getSelectedRows').length()) {viewLayer('" . Url::to(['message']) . "',$(this));return false;}",
                                    'class' => 'btn btn-primary btn-sm multi-operate',
                                ]);
                            },
                        ]
                    ]) ?>
                    <?= $this->render('_search', ['model' => $searchModel]); ?>
                </div>
                <?= GridView::widget([
                    'id' => 'userGrid',
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'columns' => [
                        ['class' => CheckboxColumn::className()],
                        [
                            'attribute' => 'id',
                        ],
                        [
                            'attribute' => 'username',
                        ],
                        [
                            'attribute' => 'nickname',
                        ],
                        [
                            'attribute' => 'agent_name',
                            'value' => 'inviteAgent.username',
                            'label'=>'所属代理',
                        ],
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                $status = User::getStatuses();
                                return isset($status[$model->status]) ? $status[$model->status] : "异常";
                            }
                        ],
                        [
                            'class' => DateColumn::class,
                            'attribute' => 'created_at'
                        ],
                        [
                            'class' => DateColumn::class,
                            'attribute' => 'userStat.last_login_at',
                        ],
                        [
                            'attribute' => 'userStat.login_number',
                            'format'=>'integer',
                        ],

                        [
                            'attribute' => 'account.available_amount',
                            'format'=>'currency',
                        ],
                        [
                            'attribute' => 'account.frozen_amount',
                            'format'=>'currency',
                        ],
                        [
                            'attribute' => 'userStat.bet_amount',
                            'format'=>'currency',
                        ],

                        [
                            'class' => ActionColumn::class,
                            'width' => '18%',
                            'buttons' => [
                                'report' => function ($url, $model, $key) {
                                    return Html::a('<i class="fa fa-table"></i> 报表', Url::to(['report','username'=>$model->username]), [
                                        'title' => $model->username,
                                        'data-pjax' => '0',
                                        'class' => 'btn btn-info btn-sm openContab',
                                    ]);
                                },
                                'change-amount' => function ($url, $model, $key) {
                                    return Html::a('<i class="fa fa-credit-card"></i> 上下分', Url::to(['change-amount','user_id'=>$model->id]), [
                                        'title' => '会员额度调整',
                                        'data-pjax' => '0',
                                        'class' => 'btn btn-warning btn-sm',
                                    ]);
                                },

                            ],
                            'template' => '{report} {update} {change-amount} {change-money}',
                        ],
                    ]
                ]); ?>
            </div>
        </div>
    </div>
</div>