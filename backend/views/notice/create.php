<?php

use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model backend\models\Notice */

$this->params['breadcrumbs'] = [
    ['label' => '系统公告', 'url' => Url::to(['index'])],
    ['label' => '发布系统公告'],
];
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>

