<?php

use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model backend\models\CompanyBank */

$this->params['breadcrumbs'] = [
    ['label' => '第三方支付列表', 'url' => Url::to(['index'])],
    ['label' => '第三方支付'],
];
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>

