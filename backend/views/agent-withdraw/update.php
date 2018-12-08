<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Withdraw */

$this->params['breadcrumbs'] = [
    ['label' => yii::t('app', '代理取款'), 'url' => Url::to(['index'])],
    ['label' => yii::t('app', 'Update') . yii::t('app', '代理取款')],
];
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
