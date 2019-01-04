<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2018-10-13 23:18
 */

use backend\models\PlatformAccountRecord;
use common\widgets\SearchForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\SystemAccountRecordSearch */
/* @var $form common\widgets\SearchForm */

?>
<div class="toolbar-searchs" style="width:100%;">
    <?php $form = SearchForm::begin([
        'action' => ['platform-trade'],
    ]); ?>
    <?= $form->field($model, 'switch')->label('收支')->dropDownList(PlatformAccountRecord::getSwitchs()) ?>
    <?= $form->field($model, 'name')->textInput() ?>
    <?= $form->field($model, 'remark')->textInput() ?>
    <?= $form->field($model, 'created_at')->dateRange() ?>
    <?= $form->searchButtons(['platform-trade']) ?>
    <?php SearchForm::end(); ?>
</div>