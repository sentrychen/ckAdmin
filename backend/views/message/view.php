<?php

use backend\models\Message;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Message */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Messages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'content:html',
            [
                'attribute' => 'is_deleted',
                'value' => function ($model) {

                    return \common\libs\Constants::getYesNoItems($model->is_deleted);
                }
            ],
            'deleted_at:date',
            'level',
            [
                'attribute' => 'user_type',
                'value' => function ($model) {

                    return Message::getUserTypes($model->user_type);
                }
            ],
            [
                'attribute' => 'notify_obj',
                'value' => function ($model) {

                    return Message::getNotifyObjs($model->notify_obj);
                }
            ],
            'sender_id',
            'sender_name',
            'created_at:date',
        ],
    ]) ?>

</div>
