<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2018-02-24 13:38
 */

use backend\models\User;
use common\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use backend\models\UserBank;
use common\helpers\Util;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
?>
<?= GridView::widget([
    'dataProvider' => new ArrayDataProvider([
        'allModels' => $model->platforms,
        'pagination' => [
            'pageSize' => 0,
        ],
    ]),
    'layout' => "{items}",
    'tableOptions' => ['class' => 'table table-hover table-bordered'],
    'filterModel' => null,
    'columns' => [

        [
            'attribute' => 'platform.name',
            'label'=>'游戏平台名称',
        ],

        [
            'attribute' => 'platform.code',
            'label'=>'平台代码',
        ],
        [
            'attribute' => 'game_account',
            'label'=>'游戏账号',
        ],
        [
            'attribute' => 'available_amount',
            'label'=>'游戏平台余额',
            'format'=>'raw',
            'value' => function($model){
                return '<span class="label label-warning" id="amount-'.$model->id.'">'. Yii::$app->formatter->asCurrency($model->available_amount) .'</span>'.
                    Html::a('<i class="fa fa-refresh"></i> 刷新','javascript:void(0)',[
                            'title' => '刷新额度',
                            'data-pjax' => '0',
                            'onclick' => "$('#amount-{$model->id}').load('".Url::to(['user/amount','id'=>$model->id])."')",
                            'class' => 'btn btn-white btn-sm pull-right',
                        ]);
            }
        ],
        [
            'attribute' => 'last_login_at',
            'label'=>'最后登陆时间',
            'format'=>'date',
        ],

    ]
]); ?>
<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'username',
        'nickname',
        'realname',
        'id_card',
        'mobile',
        'wechat',
        'qq',
        'origin',
        [
            'label' => '银行卡号',
            'format' => 'raw',
            'value' => function($model){
                $data = UserBank::getUserBank($model->id);
                $str = '';
                foreach ($data as $key => $val){
                    $str .= '<p>(';
                    $str .= $key+1;
                    $str .= ')</span>&nbsp;&nbsp;'.'<span>银行卡号：'.$val['bank_account'].'</span>&nbsp;&nbsp;'
                            .'<span>银行名称：'.$val['bank_name'].'</span>&nbsp;&nbsp;<span>开户地址：'.$val['province'].$val['city'].'</span>&nbsp;&nbsp;'
                            .' <span>开户支行：'.$val['branch_name'].'</span>';
                    $str .= '</p>';
                }
                return $str;
            },
        ],
        [
            'label' => '存款-取款的差额(¥)',
            'format' => 'raw',
            'value' => function ($model) {
                return Util::formatMoney($model->userStat->deposit_amount-$model->userStat->withdrawal_amount, false);
            },
        ],
        [
            'label'=>'所属代理',
            'attribute'=>'inviteAgent.username'
        ],
        [
            'attribute' => 'status',
            'value' => function ($model) {
                $status = User::getStatuses();
                return isset($status[$model->status]) ? $status[$model->status] : "异常";
            }
        ],
        [
            'attribute' => 'online_status',
            'value' => function ($model) {

                return User::getOnlineStatuses($model->online_status);
            }
        ],
        'created_at:date',
        'userStat.login_number',
        'userStat.last_login_at:date',
        'userStat.last_login_ip',
        'userStat.online_duration:duration',
        'userStat.deposit_number',
        'userStat.deposit_amount:currency',
        'userStat.withdrawal_number',
        'userStat.withdrawal_amount:currency',
        'userStat.bet_number',
        'userStat.bet_amount:currency',
        'account.available_amount:currency',
        'account.frozen_amount:currency',
        'account.xima_amount:currency',
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

    ],
]) ?>
