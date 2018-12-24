<?php

use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model backend\models\CompanyBank */


$this->params['breadcrumbs'] = [
    ['label' => '代理洗码方案', 'url' => Url::to(['agent'])],
    ['label' => '添加洗码方案'],
];
?>
<?= $this->render('_agent_form', [
    'model' => $model,
]) ?>

