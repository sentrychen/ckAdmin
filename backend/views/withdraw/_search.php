<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2018-10-13 23:18
 */

use common\models\UserWithdraw;
use common\widgets\SearchForm;



/* @var $this yii\web\View */
/* @var $model backend\models\search\UserWithdrawSearch */
/* @var $form common\widgets\SearchForm */

?>
<div class="toolbar-searchs">
    <?php $form = SearchForm::begin([]); ?>

    <?= $form->field($model, 'username')->label('会员名称')->textInput() ?>
    <?= $form->field($model, 'status')->label('审核状态')->dropDownList(UserWithdraw::getStatuses()) ?>
    <?= $form->field($model, 'apply_amount')->label('取款金额')->numRange(['style' => 'width:100px;']) ?>
    <?= $form->field($model, 'audit_by_username')->label('处理人员')->textInput() ?>
    <?= $form->field($model, 'created_at')->dateRange() ?>
    <?= $form->searchButtons() ?>
    <?php SearchForm::end(); ?>
</div>