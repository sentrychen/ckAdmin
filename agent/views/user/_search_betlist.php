<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2018-10-13 23:18
 */

use agent\models\Agent;
use agent\models\search\BetListSearch;
use common\models\GameType;
use common\models\Platform;
use yii\helpers\ArrayHelper;
use common\widgets\SearchForm;


/* @var $this yii\web\View */
/* @var $model backend\models\search\BetListSearch */
/* @var $form common\widgets\SearchForm */

?>
<div class="toolbar-searchs">
    <?php $form = SearchForm::begin([
        'action' => ['bet-list', 'id' => $model->user_id],
        'options' => ['class' => 'form-inline pull-right']

    ]); ?>

    <?= $form->field($model, 'username')->textInput() ?>
    <?= $form->field($model, 'agent_id')->label('所属代理')->dropDownList(Agent::getAgentTreeList(null, yii::$app->getUser()->getId(), null, true)) ?>
    <?= $form->field($model, 'platform_id')->label('游戏平台')->dropDownList(ArrayHelper::map(Platform::find()->all(), 'id', 'name')) ?>
    <?= $form->field($model, 'game_type')->dropDownList(ArrayHelper::map(GameType::find()->all(), 'name_en', 'name')) ?>
    <?= $form->field($model, 'winloss')->label('赢输')->dropDownList(BetListSearch::getWinLossList()) ?>
    <?= $form->field($model, 'bet_at')->dateRange() ?>
    <?= $form->searchButtons(['bet-list']) ?>
    <?php SearchForm::end(); ?>
</div>