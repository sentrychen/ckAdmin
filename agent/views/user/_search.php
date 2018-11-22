<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2018-10-13 23:18
 */


use agent\models\Agent;
use common\models\User;
use common\widgets\SearchForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\UserSearch */
/* @var $form common\widgets\SearchForm */
?>
<div class="toolbar-searchs">
    <?php $form = SearchForm::begin([]); ?>

    <?= $form->field($model, 'username')->textInput() ?>
    <?= $form->field($model, 'invite_agent_id')->label('所属代理')->dropDownList(Agent::getAgentTreeList(null, yii::$app->getUser()->getId(), null, true)) ?>
    <?= $form->field($model, 'status')->dropDownList(User::getStatuses()) ?>
    <?= $form->field($model, 'available_amount')->label('可用余额')->numRange(['style' => 'width:100px;']) ?>
    <?= $form->field($model, 'created_at')->dateRange() ?>
    <?= $form->searchButtons() ?>
    <?php SearchForm::end(); ?>
</div>