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
<div class="toolbar-searchs" style="width:580px">
    <?php $form = SearchForm::begin([
            'action' => ['withdraw-list','id'=>$model->user_id],
            'options'=>['class' => 'form-inline pull-right','data-pjax' => true]
    ]); ?>

    <?= $form->field($model, 'status')->dropDownList(UserWithdraw::getStatuses()) ?>
    <?= $form->field($model, 'created_at')->dateRange() ?>
    <?=$form->searchButtons(false)?>
    <?php SearchForm::end(); ?>
</div>