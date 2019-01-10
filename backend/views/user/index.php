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
use common\widgets\JsBlock;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use common\helpers\Util;
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
                                return Html::a('<i class="fa fa-send"></i> 发消息', 'javascript:void(0);', [
                                    'title' => '发消息给用户',
                                    'data-pjax' => '0',
                                    'onclick' => 'sendMessage()',
                                    'class' => 'btn btn-success btn-sm',
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
                    'showFooter' => true,
                    'footerRowOptions' => ['style' => 'font-weight:bold;'],
                    'columns' => [
                        ['class' => CheckboxColumn::className()],

                        [
                            'attribute' => 'username',
                            'footer' => '合计',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Html::a($model->username, Url::to(['report', 'username' => $model->username]), [
                                    'title' => $model->username,
                                    'data-pjax' => '0',
                                    'class' => 'openContab',
                                ]);
                            }
                        ],
                        [
                            'attribute' => 'userStat.relate_number',
                            'label' => '关联账号数',
                            'format' => 'raw',
                            'value' => function ($model) {
                                if (isset($model->userStat) && $model->userStat->relate_number > 0) {
                                    return Html::a($model->userStat->relate_number, Url::to(['relate', 'id' => $model->id]), [
                                        'title' => $model->username . '的关联账号',
                                        'data-pjax' => '0',
                                        'class' => 'openContab'
                                    ]);
                                }
                                return '-';
                            }
                        ],
                        [
                            'attribute' => 'agent_name',
                            'label'=>'所属代理',
                            'format' => 'raw',
                            'value' => function ($model) {
                                if (!$model->inviteAgent) return '';
                                return Html::a($model->inviteAgent->username, Url::to(['agent/view', 'id' => $model->inviteAgent->id]), [
                                    'title' => '查看代理详情',
                                    'data-pjax' => '0',
                                    'class' => 'openContab',
                                ]);
                            }
                        ],
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                $status = User::getStatuses();
                                return isset($status[$model->status]) ? $status[$model->status] : "异常";
                            }
                        ],

                        [
                            'attribute' => 'xima_plan_id',
                            'label' => '洗码方案',
                            'format' => 'raw',
                            'value' => function ($model) {
                                if ($model->xima_plan_id) {
                                    return Html::a($model->ximaPlan->name, Url::to(['xima-plan/user-view', 'id' => $model->xima_plan_id]), [
                                        'title' => '查看洗码方案',
                                        'data-pjax' => '0',
                                        'class' => 'openContab'
                                    ]);
                                }
                                return '';
                            }
                        ],
                        [
                            'attribute' => 'account.available_amount',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Util::formatMoney($model->account->available_amount, false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['account_available_amount'], false) . '</span>'
                        ],

                        [
                            'attribute' => 'userStat.deposit_amount',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Util::formatMoney(isset($model->userStat->deposit_amount)?$model->userStat->deposit_amount:0, false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['userStat_deposit_amount'], false) . '</span>'
                        ],
                        [
                            'attribute' => 'userStat.withdrawal_amount',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Util::formatMoney(isset($model->userStat->withdrawal_amount)?$model->userStat->withdrawal_amount:0, false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['userStat_withdrawal_amount'], false) . '</span>'
                        ],
                        [
                            'attribute' => 'userStat.bet_amount',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Util::formatMoney(isset($model->userStat->bet_amount)?$model->userStat->bet_amount:0, false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['userStat_bet_amount'], false) . '</span>'
                        ],
                        [
                            'attribute' => 'account.xima_amount',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Util::formatMoney($model->account->xima_amount, false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['account_xima_amount'], false) . '</span>'
                        ],
                        [
                            'attribute' => 'userStat.profit',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Util::formatMoney(isset($model->userStat->profit) ? $model->userStat->profit : 0, false);
                            },
                            'footer' => '<span class="label label-default">' . Util::formatMoney($totals['userStat_profit'], false) . '</span>'
                        ],
                        [
                            'class' => DateColumn::class,
                            'attribute' => 'created_at',
                        ],

                        [
                            'class' => ActionColumn::class,
                            'width' => '120',
                            'buttons' => [
                                'report' => function ($url, $model, $key) {
                                    return Html::a('<i class="fa fa-info"></i> 详情', Url::to(['report', 'username' => $model->username]), [
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
<?php JsBlock::begin() ?>
    <script type="text/javascript">
        function sendMessage() {
        var chk_value = [];
        var num = $('input[name="selection[]"]:checked').length;
        if(num == false){
            layer.alert('请先选择要操作的记录!',{icon:2});
            return false;
        }
        $('input[name="selection[]"]:checked').each(function(){
            chk_value.push($(this).val());
        });
            var ids = chk_value.join(',');
            layer.open({
                type: 2,
                title: '发送消息',
                shadeClose: true,
                shade: 0.8,
                area: ['801px', '550px'],
                content: "<?=Url::to(['message'])?>?ids=" + ids
            });
        }

</script>
<?php JsBlock::end() ?>