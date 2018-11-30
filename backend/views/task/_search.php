<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use backend\models\Task;
use common\widgets\SearchForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\search\TaskSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="toolbar-search">

    <?php $form = SearchForm::begin([]); ?>

    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'switch')->dropDownList(Task::getSwitchs()) ?>
    <?= $form->field($model, 'status')->dropDownList(Task::getStatuses()) ?>
    <?=$form->searchButtons()?>
    <?php SearchForm::end(); ?>


</div>
