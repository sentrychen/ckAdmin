<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2018-10-13 23:18
 */

use backend\models\Agent;
use backend\models\GameType;
use backend\models\Platform;
use yii\helpers\ArrayHelper;
use common\widgets\SearchForm;


/* @var $this yii\web\View */
/* @var $model backend\models\search\UserXimaRecordSearch */
/* @var $form common\widgets\SearchForm */

?>
<div class="toolbar-searchs" style="width:100%;">
    <?php $form = SearchForm::begin([
        'action' => ['index']
    ]); ?>
    <?= $form->field($model, 'record_id')->label('投注单号')->textInput() ?>
    <?= $form->field($model, 'agent_id')->label('代理')->dropDownList(Agent::getAgentTreeList(null, yii::$app->getUser()->getId(), null, true)) ?>
    <?= $form->field($model, 'username')->label('投注玩家')->textInput() ?>
    <?= $form->field($model, 'platform_id')->label('游戏平台')->dropDownList(ArrayHelper::map(Platform::find()->all(), 'id', 'name')) ?>
    <?= $form->field($model, 'game_type')->dropDownList(ArrayHelper::map(GameType::find()->all(), 'name_en', 'name')) ?>
    <?= $form->field($model, 'created_at')->dateRange() ?>
    <?= $form->searchButtons(['index']) ?>
    <?php SearchForm::end(); ?>
</div>