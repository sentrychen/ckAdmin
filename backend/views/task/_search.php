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

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'route') ?>

    <?php //= $form->field($model, 'crontab_str') ?>

    <?= $form->field($model, 'switch') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'run_times') ?>

    <?php // echo $form->field($model, 'error_times') ?>

    <?php // echo $form->field($model, 'last_run_at') ?>

    <?php // echo $form->field($model, 'next_run_at') ?>

    <?php // echo $form->field($model, 'exec_mem') ?>

    <?php // echo $form->field($model, 'exec_time') ?>

    <?=$form->searchButtons()?>
    <?php SearchForm::end(); ?>


</div>
