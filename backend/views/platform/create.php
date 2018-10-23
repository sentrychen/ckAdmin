<?php

use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model backend\models\Platform */

$this->params['breadcrumbs'] = [
    ['label' => yii::t('app', 'Platform'), 'url' => Url::to(['index'])],
    ['label' => yii::t('app', 'Create') . yii::t('app', 'Platform')],
];
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>

