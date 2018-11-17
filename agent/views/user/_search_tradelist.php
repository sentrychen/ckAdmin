<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2018-10-13 23:18
 */

use agent\models\Agent;
use agent\models\UserAccountRecord;
use agent\models\TradeType;
use yii\helpers\ArrayHelper;
use common\widgets\SearchForm;


/* @var $this yii\web\View */
/* @var $model backend\models\search\BetListSearch */
/* @var $form common\widgets\SearchForm */

?>
<div class="toolbar-searchs">
    <?php $form = SearchForm::begin([
        'action' => ['trade-list', 'id' => $model->user_id],
        'options' => ['class' => 'form-inline pull-right']
    ]); ?>
    <?= $form->field($model, 'username')->label('会员名')->textInput() ?>
    <?= $form->field($model, 'agent_id')->label('所属代理')->dropDownList(Agent::getAgentTreeList(null, yii::$app->getUser()->getId(), null, true)) ?>

    <?= $form->field($model, 'switch')->label('收支')->dropDownList(UserAccountRecord::getSwitchStatus()) ?>
    <?= $form->field($model, 'trade_type_id')->dropDownList(ArrayHelper::map(TradeType::find()->all(), 'id', 'name')) ?>
    <?= $form->field($model, 'created_at')->dateRange() ?>
    <?= $form->searchButtons(['trade-list']) ?>
    <?php SearchForm::end(); ?>
</div>