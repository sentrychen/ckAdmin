<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2018-10-13 23:18
 */

use backend\models\Agent;
use common\widgets\SearchForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\search\UserSearch */
/* @var $form common\widgets\SearchForm */
?>
<div class="toolbar-searchs">
    <?php $form = SearchForm::begin([]); ?>

    <?= $form->field($model, 'username')->textInput() ?>
    <?= $form->field($model, 'parent_id')->label('上级代理')->dropDownList(['0'=>'顶级代理'] + Agent::getAgentTreeList()) ?>
    <?= $form->field($model, 'promo_code')->textInput() ?>
    <?= $form->field($model, 'status')->dropDownList(Agent::getStatuses()) ?>
        <?= $form->field($model, 'created_at')->dateRange() ?>
    <?=$form->searchButtons()?>
    <?php SearchForm::end(); ?>
</div>