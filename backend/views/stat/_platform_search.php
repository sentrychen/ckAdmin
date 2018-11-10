<?php

use backend\models\Agent;
use backend\models\Platform;
use backend\models\Rebate;
use common\widgets\SearchForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\PlatformDailySearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="toolbar-searchs">
    <?php $form = SearchForm::begin(['action' => ['platform']]); ?>

    <?= $form->field($model, 'platform_id')->dropDownList(Platform::getPlatformNames()) ?>
    <?= $form->field($model, 'ymd')->dateRange(['ranges' => ['本周', '上周', '本月', '上月', '今年', '去年']]) ?>
    <?= $form->searchButtons() ?>
    <?php SearchForm::end(); ?>
</div>