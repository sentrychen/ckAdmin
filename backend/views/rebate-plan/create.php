<?php

use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model backend\models\CompanyBank */

$this->params['breadcrumbs'] = [
    ['label' => '用户返佣方案', 'url' => Url::to(['index'])],
    ['label' => '添加返佣方案'],
];
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>

