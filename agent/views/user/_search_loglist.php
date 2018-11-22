<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2018-10-13 23:18
 */


use agent\models\Agent;
use agent\models\UserLoginLog;
use common\widgets\SearchForm;


/* @var $this yii\web\View */
/* @var $model backend\models\search\LoginLogSearch */
/* @var $form common\widgets\SearchForm */

?>
<div class="toolbar-searchs">
    <?php $form = SearchForm::begin([
        'action' => ['log-list', 'id' => $model->user_id],
        'options' => ['class' => 'form-inline pull-right']
    ]); ?>

    <?= $form->field($model, 'username')->label('会员名')->textInput() ?>
    <?= $form->field($model, 'agent_id')->label('所属代理')->dropDownList(Agent::getAgentTreeList(null, yii::$app->getUser()->getId(), null, true)) ?>

    <?= $form->field($model, 'client_type')->dropDownList(UserLoginLog::getLoginClients()) ?>
    <?= $form->field($model, 'created_at')->dateRange() ?>
    <?= $form->searchButtons(['log-list']) ?>
    <?php SearchForm::end(); ?>
</div>