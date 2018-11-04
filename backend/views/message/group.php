<?php

use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model backend\models\Message */

$this->params['breadcrumbs'] = [
    ['label' => '消息管理', 'url' => Url::to(['index'])],
    ['label' => '群发消息'],
];
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>

