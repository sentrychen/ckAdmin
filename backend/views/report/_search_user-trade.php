<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2018-10-13 23:18
 */

use backend\models\UserAccountRecord;
use backend\models\TradeType;
use common\libs\Constants;
use yii\helpers\ArrayHelper;
use common\widgets\SearchForm;


/* @var $this yii\web\View */
/* @var $model backend\models\search\UserAccountRecordSearch */
/* @var $form common\widgets\SearchForm */

?>
<div class="toolbar-searchs">
    <?php $form = SearchForm::begin([
        'action' => ['user-trade'],
    ]); ?>
    <?= $form->field($model, 'username')->label('会员名称')->textInput() ?>
    <?= $form->field($model, 'switch')->label('收支')->dropDownList(UserAccountRecord::getSwitchStatus()) ?>
    <?= $form->field($model, 'trade_type_id')->dropDownList(Constants::getTradeTypeItems()) ?>
    <?= $form->field($model, 'remark')->textInput() ?>
    <?= $form->field($model, 'created_at')->dateRange() ?>
    <?= $form->searchButtons(['user-trade']) ?>
    <?php SearchForm::end(); ?>
</div>