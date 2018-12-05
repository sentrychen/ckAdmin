<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2018-10-13 23:18
 */


use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use common\widgets\SearchForm;
use yii\helpers\Url;
use common\libs\Constants;
use common\models\TwoBarCode;

/* @var $this yii\web\View */
/* @var $model backend\models\search\CompanyBankSearch */
/* @var $form common\widgets\SearchForm */
?>
<div class="toolbar-searchs">
    <?php $form = SearchForm::begin([]); ?>

    <?= $form->field($model, 'name')->textInput() ?>
    <?= $form->field($model, 'status')->dropDownList(TwoBarCode::getStatuses()) ?>
    <?= $form->searchButtons() ?>
    <?php SearchForm::end(); ?>
</div>