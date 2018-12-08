<?php

use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model backend\models\Withdraw */

$this->params['breadcrumbs'] = [
    ['label' => yii::t('app', '取款列表'), 'url' => Url::to(['index'])],
    ['label' => yii::t('app', 'Create') . yii::t('app', '取款申请')],
];
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>

