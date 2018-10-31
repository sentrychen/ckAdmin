<?php

use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model backend\models\Platform */

$this->params['breadcrumbs'] = [
    ['label' => '游戏平台', 'url' => Url::to(['index'])],
    ['label' => '新增游戏平台'],
];
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>

