<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2018-10-13 23:18
 */

use common\models\User;
use yii\helpers\Html;
use common\widgets\SearchForm;
use yii\helpers\Url;
use common\libs\Constants;

/* @var $this yii\web\View */
/* @var $model backend\models\search\UserSearch */
/* @var $form common\widgets\SearchForm */
?>
<div class="toolbar-searchs">
    <?php $form = SearchForm::begin([]); ?>

    <?= $form->field($model, 'username')->textInput() ?>
    <?= $form->field($model, 'agent_name')->label('所属代理')->textInput() ?>
    <?= $form->field($model, 'status')->dropDownList(User::getStatuses()) ?>
    <?= $form->field($model, 'available_amount')->label('可用余额')->numRange(['style'=>'width:100px;']) ?>
    <?= $form->field($model, 'created_at')->dateRange() ?>
    <?=$form->searchButtons()?>
    <?php SearchForm::end(); ?>
</div>