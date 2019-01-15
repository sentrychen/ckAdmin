<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Message */
$levels = ['default', 'info', 'warning', 'danger'];
?>
<div class="well well-sm">
    <strong><?= strip_tags($model->title) ?></strong>

</div>
<div class="panel panel-<?= $levels[$model->level] ?>">
    <div class="panel-body" style="height:130px;">
        <?= Html::encode($model->content) ?>
    </div>
    <small class="pull-right"
           style="padding: 5px;"><?= yii::$app->getFormatter()->asDate($model->created_at) ?> <?= $model->sender_name ?></small>
</div>
