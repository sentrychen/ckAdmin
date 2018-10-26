<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2018-10-13 23:18
 */

use backend\models\Trade;
use backend\models\TradeType;
use yii\helpers\ArrayHelper;
use common\widgets\SearchForm;



/* @var $this yii\web\View */
/* @var $model backend\models\search\BetListSearch */
/* @var $form common\widgets\SearchForm */

?>
<div class="toolbar-searchs" style="width:680px">
    <?php $form = SearchForm::begin([
            'action' => ['trade-list','id'=>$model->user_id],
            'options'=>['class' => 'form-inline pull-right','data-pjax' => true]
    ]); ?>

    <?= $form->field($model, 'income_switch')->label('收支')->dropDownList(Trade::getSwitchStatus()) ?>
    <?= $form->field($model, 'trade_type_id')->dropDownList(ArrayHelper::map(TradeType::find()->all(),'id','name')) ?>
    <?= $form->field($model, 'created_at')->dateRange() ?>
    <?=$form->searchButtons(false)?>
    <?php SearchForm::end(); ?>
</div>