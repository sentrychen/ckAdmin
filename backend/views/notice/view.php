<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Notice */

$this->title = '系统公告';
$this->params['breadcrumbs'][] = ['label' => '系统公告', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notice-view">

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
            'content',
            [
                'attribute' => 'user_type',
                'value' => function ($model) {

                    return \backend\models\Notice::getUserTypes($model->user_type);
                }
            ],
            'expire_at:date',
            'set_top',
            [
                'attribute' => 'is_deleted',
                'value' => function ($model) {

                    return \common\libs\Constants::getYesNoItems($model->is_deleted);
                }
            ],
            'deleted_at:date',
            'publish_by',
            'publish_name',
            'created_at:date',
        ],
    ]) ?>

</div>
