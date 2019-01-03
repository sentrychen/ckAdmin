<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2018-10-13 23:18
 */


use common\widgets\SearchForm;
use common\models\ThirdPayment;

/* @var $this yii\web\View */
/* @var $model backend\models\search\CompanyBankSearch */
/* @var $form common\widgets\SearchForm */
?>
<div class="toolbar-searchs">
    <?php $form = SearchForm::begin([]); ?>

    <?= $form->field($model, 'name')->textInput() ?>
    <?= $form->field($model, 'status')->dropDownList(ThirdPayment::getStatuses()) ?>
    <?= $form->searchButtons() ?>
    <?php SearchForm::end(); ?>
</div>