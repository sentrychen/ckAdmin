<?php

use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model common\models\Tenant */

$this->params['breadcrumbs'] = [
    ['label' => '租户管理', 'url' => Url::to(['index'])],
    ['label' => '创建租户'],
];
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>

