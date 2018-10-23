<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\UserWithdraw */

$this->params['breadcrumbs'] = [
    ['label' => yii::t('app', 'User Withdraw'), 'url' => Url::to(['index'])],
    ['label' => yii::t('app', 'Update') . yii::t('app', 'User Withdraw')],
];
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
