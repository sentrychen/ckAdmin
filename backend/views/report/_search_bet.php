<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2018-10-13 23:18
 */

use backend\models\search\BetListSearch;
use backend\models\GameType;
use backend\models\Platform;
use yii\helpers\ArrayHelper;
use common\widgets\SearchForm;


/* @var $this yii\web\View */
/* @var $model backend\models\search\BetListSearch */
/* @var $form common\widgets\SearchForm */

?>
<div class="toolbar-searchs" style="width:100%;">
    <?php $form = SearchForm::begin([
        'action' => ['bet']
    ]); ?>
    <?= $form->field($model, 'username')->label('会员名称')->textInput() ?>
    <?= $form->field($model, 'platform_id')->label('游戏平台')->dropDownList(ArrayHelper::map(Platform::find()->all(), 'id', 'name')) ?>
    <?= $form->field($model, 'game_type')->dropDownList(ArrayHelper::map(GameType::find()->all(), 'name_en', 'name')) ?>
    <?= $form->field($model, 'winloss')->label('赢输')->dropDownList(BetListSearch::getWinLossList()) ?>
    <?= $form->field($model, 'bet_at')->dateRange() ?>
    <?= $form->searchButtons(['bet']) ?>
    <?php SearchForm::end(); ?>
</div>