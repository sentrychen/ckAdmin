<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2018-10-13 23:18
 */

use backend\models\Agent;
use common\widgets\SearchForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\UserSearch */
/* @var $form common\widgets\SearchForm */
?>
<div class="toolbar-searchs">
    <?php $form = SearchForm::begin([]); ?>

    <?= $form->field($model, 'username')->textInput() ?>
    <?= $form->field($model, 'realname')->textInput() ?>
    <?= $form->field($model, 'parent_id')->textInput() ?>
    <?= $form->field($model, 'promo_code')->textInput() ?>
    <?= $form->field($model, 'status')->dropDownList(Agent::getStatuses()) ?>
        <?= $form->field($model, 'created_at')->dateRange() ?>
    <?=$form->searchButtons()?>
    <?php SearchForm::end(); ?>
</div>