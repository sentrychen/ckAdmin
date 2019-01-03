<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\CompanyBank */

$this->params['breadcrumbs'] = [
    ['label' => '代理返佣方案', 'url' => Url::to(['index'])],
    ['label' => '编辑返佣方案'],
];
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
