<?php


use common\widgets\SearchForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\DailySearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="toolbar-searchs">
    <?php $form = SearchForm::begin(['action' => ['daily']]); ?>

    <?= $form->field($model, 'ymd')->dateRange(['ranges' => ['本周', '上周', '本月', '上月', '今年', '去年']]) ?>
    <?= $form->searchButtons(['daily']) ?>
    <?php SearchForm::end(); ?>
</div>