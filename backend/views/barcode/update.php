<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\CompanyBank */

$this->params['breadcrumbs'] = [
    ['label' => '二维码管理', 'url' => Url::to(['index'])],
    ['label' => '编辑二维码'],
];
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
