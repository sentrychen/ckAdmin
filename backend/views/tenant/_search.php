<?php

use backend\models\GameType;
use backend\models\Platform;
use common\widgets\SearchForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\TenantSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="toolbar-searchs">
    <?php $form = SearchForm::begin([]); ?>
    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'app_name') ?>
    <?= $form->searchButtons() ?>
    <?php SearchForm::end(); ?>
</div>
