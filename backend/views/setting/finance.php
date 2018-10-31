<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-03-15 21:16
 */

/**
 * @var $this \yii\web\View
 * @var $model common\models\Options
 */

use backend\widgets\ActiveForm;
use common\libs\Constants;

$this->title = '财务设置';
$this->params['breadcrumbs'][] = '财务设置';
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox float-e-margins">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'finance_deposit_max') ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'finance_deposit_min') ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'finance_withdraw_max') ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'finance_withdraw_min') ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'finance_add_amount_open_aduit')->radioList(Constants::getYesNoItems()) ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'finance_reduce_amount_open_aduit')->radioList(Constants::getYesNoItems()) ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'finance_add_amount_max') ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'finance_reduce_amount_max') ?>
                <div class="hr-line-dashed"></div>
                <?= $form->defaultButtons() ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
