<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2018-10-13 23:18
 */

use backend\models\Agent;
use backend\models\UserLoginLog;
use common\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use common\widgets\SearchForm;
use yii\helpers\Url;
use common\libs\Constants;

/* @var $this yii\web\View */
/* @var $model backend\models\search\LoginLogSearch
/* @var $form common\widgets\SearchForm */
?>
<div class="toolbar-searchs">
    <?php $form = SearchForm::begin(['action' => ['online']]); ?>

    <?= $form->field($model, 'username')->label('会员账号')->textInput() ?>
    <?= $form->field($model, 'invite_agent_id')->label('所属代理')->dropDownList(Agent::getAgentTreeList()) ?>
    <?= $form->field($model, 'device_type')->label('设备类型')->dropDownList(UserLoginLog::getDeviceTypes()) ?>
    <?= $form->field($model, 'client_type')->label('应用类型')->dropDownList(UserLoginLog::getLoginClients()) ?>
    <?= $form->searchButtons(['online']) ?>
    <?php SearchForm::end(); ?>
</div>