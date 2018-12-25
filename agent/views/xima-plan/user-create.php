<?php

use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model backend\models\CompanyBank */


$this->params['breadcrumbs'] = [
    ['label' => '用户返佣方案', 'url' => Url::to(['user'])],
    ['label' => '添加返佣方案'],
];
?>
<?= $this->render('_user_form', [
    'model' => $model,
]) ?>

