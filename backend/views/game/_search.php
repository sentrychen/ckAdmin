<?php

use backend\models\GameType;
use backend\models\Platform;
use common\widgets\SearchForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\search\PlatformGameSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="toolbar-searchs" style="width: 100%">
    <?php $form = SearchForm::begin([]); ?>

    <?= $form->field($model, 'platform_id')->dropDownList(Platform::getPlatformNames()) ?>
    <?= $form->field($model, 'game_type_id')->dropDownList(GameType::getTypeNames()) ?>
    <?= $form->searchButtons() ?>
    <?php SearchForm::end(); ?>
</div>
