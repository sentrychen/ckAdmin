<?php

use backend\models\Agent;
use backend\models\Rebate;
use common\widgets\SearchForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\RebateSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="toolbar-searchs">
    <?php $form = SearchForm::begin(['action' => ['agent']]); ?>

    <?= $form->field($model, 'agent_id')->label('代理账户')->dropDownList(Agent::getAgentTreeList()) ?>
    <?= $form->field($model, 'ymd')->dateRange(['ranges' => ['本周', '上周', '本月', '上月', '今年', '去年']]) ?>
    <?= $form->searchButtons() ?>
    <?php SearchForm::end(); ?>
</div>