<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\CompanyBank */

$this->params['breadcrumbs'] = [
    ['label' => '用户洗码方案', 'url' => Url::to(['user'])],
    ['label' => '编辑洗码方案'],
];
?>
<?= $this->render('_user_form', [
    'model' => $model,
]) ?>
