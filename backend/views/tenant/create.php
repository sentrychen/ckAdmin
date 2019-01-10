<?php

use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model common\models\Tenant */

$this->params['breadcrumbs'] = [
    ['label' => yii::t('app', 'Tenant'), 'url' => Url::to(['index'])],
    ['label' => yii::t('app', 'Create') . yii::t('app', 'Tenant')],
];
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>

