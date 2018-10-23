<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Message */

$this->params['breadcrumbs'] = [
    ['label' => yii::t('app', 'Message'), 'url' => Url::to(['index'])],
    ['label' => yii::t('app', 'Update') . yii::t('app', 'Message')],
];
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
