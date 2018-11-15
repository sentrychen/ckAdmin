<?php

use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model backend\models\Task */

$this->params['breadcrumbs'] = [
    ['label' => yii::t('app', 'Task'), 'url' => Url::to(['index'])],
    ['label' => yii::t('app', 'Create') . yii::t('app', 'Task')],
];
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>

