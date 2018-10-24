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
                        'template' => '{refresh} {create} ',
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
                            'attribute' => 'userStat.deposit_amount',
                            'format'=>'currency',
                        ],
                        [
                            'attribute' => 'userStat.withdrawal_amount',
                            'format'=>'currency',
                        ],
                        [
                            'attribute' => 'userStat.bet_amount',
                            'format'=>'currency',
                        ],

                        [
                            'class' => ActionColumn::class,
                            'width' => '130px',
                            'buttons' => [
                                'report' => function ($url, $model, $key) {
                                    return Html::a('<i class="fa fa-table"></i> 报表', Url::to(['report','username'=>$model->username]), [
                                        'title' => '会员报表',
                                        'data-pjax' => '0',
                                        'class' => 'btn btn-info btn-sm openContab',
                                    ]);
                                },
                                'amount' => function ($url, $model, $key) {
                                    return Html::a('<i class="fa fa-cny"></i> 额度', Url::to(['change-amount','username'=>$model->username]), [
                                        'title' => '会员额度调整',
                                        'data-pjax' => '0',
                                        'class' => 'btn btn-warning btn-sm openContab',
                                    ]);
                                },
                            ],
                            'template' => '{report} {update} {amount}',
                        ],
                    ]
                ]); ?>
            </div>
        </div>
    </div>
</div>