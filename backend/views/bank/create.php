<?php

use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model backend\models\CompanyBank */

$this->params['breadcrumbs'] = [
    ['label' => '银行卡管理', 'url' => Url::to(['index'])],
    ['label' => '添加银行卡'],
];
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>

