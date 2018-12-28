<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2018-10-13 23:18
 */

use backend\models\Agent;
use backend\models\UserLoginLog;
use common\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use common\widgets\SearchForm;
use yii\helpers\Url;
use common\libs\Constants;

/* @var $this yii\web\View */
/* @var $model backend\models\search\LoginLogSearch
/* @var $form common\widgets\SearchForm */
?>
<div class="toolbar-searchs">
    <?php $form = SearchForm::begin(['action' => ['relate', 'id' => $model->user_id]]); ?>

    <?= $form->field($model, 'username')->label('关联会员账号')->textInput() ?>
    <?= $form->field($model, 'ip')->label('登录IP')->textInput() ?>
    <?= $form->field($model, 'deviceid')->label('设备ID')->textInput() ?>
    <?= $form->searchButtons(['relate', 'id' => $model->user_id]) ?>
    <?php SearchForm::end(); ?>
</div>