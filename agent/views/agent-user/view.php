<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2018-02-24 14:26
 */

use agent\models\User;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AgentUser */
?>
<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'username',
        'email',
        [
            'attribute' => 'avatar',
            'format' => 'raw',
            'value' => function ($model) {
                if (empty($model->avatar)) return '-';
                return "<img style='max-width:100px;max-height:100px' src='" . $model->avatar . "'>";
            }
        ],
        [
            'attribute' => 'status',
            'value' => function ($model) {
                if ($model->status == User::STATUS_ACTIVE) {
                    return yii::t('app', 'Normal');
                } else if ($model->status == User::STATUS_DELETED) {
                    return yii::t('app', 'Disabled');
                }
            }
        ],
        'created_at:datetime',
        'updated_at:datetime',
    ],
]) ?>