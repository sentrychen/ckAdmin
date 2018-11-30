<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2018-02-24 13:38
 */

use backend\models\Agent;
use common\libs\Constants;
use agent\models\User;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model agent\models\User */
?>
<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'username',
        'realname',
        'promo_code',
        ['attribute' => 'rebate_rate', 'format' => ['percent', 2]],
        [
            'attribute' => 'xima_status',
            'value' => function ($model) {
                return Constants::getYesNoItems($model->xima_status);
            }
        ],
        [
            'attribute' => 'xima_type',
            'value' => function ($model) {
                return Constants::getXiMaTypes($model->xima_type);
            }
        ],
        ['attribute' => 'xima_rate', 'format' => ['percent', 2]],
        [
            'attribute' => 'status',
            'value' => function ($model) {
                $status = Agent::getStatuses();
                return $status[$model->status];
            }
        ],
        'created_at:datetime',
        'updated_at:datetime',
        ['label' => '会员推广链接',
            'value' => function ($model) {
                return yii::$app->option->agent_user_reg_url . '?code=' . $model->promo_code;
            }
        ],
        ['label' => '代理推广链接',
            'value' => function ($model) {
                return yii::$app->option->agent_reg_url . '?code=' . $model->promo_code;
            }
        ]
    ],
]) ?>