<?php

use backend\models\Agent;
use backend\models\Rebate;
use common\widgets\SearchForm;


/* @var $this yii\web\View */
/* @var $model backend\models\search\RebateSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="toolbar-searchs" style="width:100%;">
    <?php $form = SearchForm::begin(['action'=>['rebate']]); ?>

    <?= $form->field($model, 'ym')->dropDownList(Rebate::getYms()) ?>
    <?= $form->field($model, 'agent_id')->label('代理账号')->dropDownList(Agent::getAgentTreeList()) ?>
    <?= $form->field($model, 'platform_id')->label('平台')->dropDownList(\backend\models\Platform::getPlatformNames()) ?>
    <?=$form->searchButtons(['rebate'])?>
    <?php SearchForm::end(); ?>
</div>