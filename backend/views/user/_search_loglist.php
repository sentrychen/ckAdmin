<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2018-10-13 23:18
 */

use backend\models\UserAccountRecord;
use backend\models\TradeType;
use backend\models\UserLoginLog;
use yii\helpers\ArrayHelper;
use common\widgets\SearchForm;



/* @var $this yii\web\View */
/* @var $model backend\models\search\LoginLogSearch */
/* @var $form common\widgets\SearchForm */

?>
<div class="toolbar-searchs" style="width:680px">
    <?php $form = SearchForm::begin([
            'action' => ['log-list','id'=>$model->user_id],
            'options'=>['class' => 'form-inline pull-right','data-pjax' => true]
    ]); ?>

    <?= $form->field($model, 'client_type')->dropDownList(UserLoginLog::getLoginClients()) ?>
        <?= $form->field($model, 'created_at')->dateRange() ?>
    <?=$form->searchButtons(false)?>
    <?php SearchForm::end(); ?>
</div>