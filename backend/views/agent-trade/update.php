<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\AgentAccountRecord */

$this->params['breadcrumbs'] = [
    ['label' => yii::t('app', 'Agent Account Record'), 'url' => Url::to(['index'])],
    ['label' => yii::t('app', 'Update') . yii::t('app', 'Agent Account Record')],
];
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
