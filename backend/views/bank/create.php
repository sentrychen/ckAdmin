<?php

use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model backend\models\CompanyBank */

$this->params['breadcrumbs'] = [
    ['label' => yii::t('app', 'Company Bank'), 'url' => Url::to(['index'])],
    ['label' => yii::t('app', 'Create') . yii::t('app', 'Company Bank')],
];
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>

