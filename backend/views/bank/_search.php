<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2018-10-13 23:18
 */

use backend\models\Agent;
use backend\models\CompanyBank;
use backend\models\Notice;
use common\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use common\widgets\SearchForm;
use yii\helpers\Url;
use common\libs\Constants;

/* @var $this yii\web\View */
/* @var $model backend\models\search\CompanyBankSearch */
/* @var $form common\widgets\SearchForm */
?>
<div class="toolbar-searchs">
    <?php $form = SearchForm::begin([]); ?>

    <?= $form->field($model, 'bank_username')->textInput() ?>
    <?= $form->field($model, 'bank_account')->textInput() ?>
    <?= $form->field($model, 'bank_name')->textInput() ?>
    <?= $form->field($model, 'card_type')->dropDownList(CompanyBank::getCardTypes()) ?>
    <?= $form->field($model, 'status')->dropDownList(CompanyBank::getStatuses()) ?>
    <?= $form->searchButtons() ?>
    <?php SearchForm::end(); ?>
</div>