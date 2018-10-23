<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\UserDeposit */

$this->params['breadcrumbs'] = [
    ['label' => yii::t('app', 'User Deposit'), 'url' => Url::to(['index'])],
    ['label' => yii::t('app', 'Update') . yii::t('app', 'User Deposit')],
];
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
