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
        ],

        [
            'attribute' => 'platform.code',
        ],
        [
            'attribute' => 'game_account',
        ],
        [
            'attribute' => 'available_amount',
            'format'=>'html',
            'value' => function($model){
                return Yii::$app->formatter->asCurrency($model->available_amount) .
                    Html::a('<i class="fa fa-refresh"></i> 刷新', Url::to(['refresh','id'=>$model->id]), [
                            'title' => '刷新额度',
                            'data-pjax' => '0',
                            'class' => 'btn btn-white btn-sm pull-right',
                        ]);
            }
        ],
        [
            'attribute' => 'last_login_at',
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
        'created_at:date',
        'userStat.login_number',
        'userStat.last_login_at:date',
        'userStat.last_login_ip',
        'userStat.deposit_number',
        'userStat.deposit_amount:currency',
        'userStat.withdrawal_number',
        'userStat.withdrawal_amount:currency',
        'userStat.bet_number',
        'userStat.bet_amount:currency',
        'account.available_amount:currency',
        'account.user_point',
        'account.xima_account:currency',

    ],
]) ?>
