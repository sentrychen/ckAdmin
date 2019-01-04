<?php

use common\models\Agent;
use common\models\AgentAccountRecord;
use common\widgets\SearchForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\AgentAccountRecordSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="toolbar-searchs" style="width:100%;">
    <?php $form = SearchForm::begin([
        'action' => ['agent-trade']
    ]); ?>

    <?= $form->field($model, 'agent_id')->label('代理')->dropDownList(Agent::getAgentTreeList()) ?>
    <?= $form->field($model, 'name')->textInput() ?>
    <?= $form->field($model, 'switch')->label('收支')->dropDownList(AgentAccountRecord::getSwitchStatus()) ?>
    <?= $form->field($model, 'created_at')->dateRange() ?>
    <?= $form->searchButtons(['agent-trade']) ?>
    <?php SearchForm::end(); ?>
</div>
