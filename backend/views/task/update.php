<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Task */

$this->params['breadcrumbs'] = [
    ['label' => '任务列表', 'url' => Url::to(['index'])],
    ['label' => '修改任务'],
];
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
