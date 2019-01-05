<?php

use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model backend\models\PlatformGame */

$this->params['breadcrumbs'] = [
    ['label' => '游戏管理', 'url' => Url::to(['index'])],
    ['label' => '新增游戏'],
];
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>

