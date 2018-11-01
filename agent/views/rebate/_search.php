<?php

use backend\models\Agent;
use backend\models\Rebate;
use common\widgets\SearchForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\RebateSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="toolbar-searchs">
    <?php $form = SearchForm::begin([]); ?>

    <?= $form->field($model, 'ym')->dropDownList(Rebate::getYms()) ?>
    <?= $form->searchButtons() ?>
    <?php SearchForm::end(); ?>
</div>