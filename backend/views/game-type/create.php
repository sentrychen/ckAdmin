<?php

use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model backend\models\GameType */

$this->params['breadcrumbs'] = [
    ['label' => yii::t('app', 'Game Type'), 'url' => Url::to(['index'])],
    ['label' => yii::t('app', 'Create') . yii::t('app', 'Game Type')],
];
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>

