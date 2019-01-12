<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Message */
$levels = ['default', 'info', 'warning', 'danger'];
?>
<div>
    <div class="panel panel-<?= $levels[$model->level] ?>">
        <div class="panel-heading">
            <h3 class="panel-title"><?= strip_tags($model->title) ?></h3>
        </div>
        <div class="panel-body">
            <?= Html::encode($model->content) ?>
            <br/>
            <small class="pull-right"><?= yii::$app->getFormatter()->asDate($model->created_at) ?></small>

        </div>
    </div>
</div>
