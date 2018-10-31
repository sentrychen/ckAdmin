<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\GameType */

$this->params['breadcrumbs'] = [
    ['label' => '游戏类型', 'url' => Url::to(['index'])],
    ['label' => '编辑游戏类型'],
];
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
