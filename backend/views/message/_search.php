<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2018-10-13 23:18
 */

use backend\models\Agent;
use backend\models\Message;
use common\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use common\widgets\SearchForm;
use yii\helpers\Url;
use common\libs\Constants;

/* @var $this yii\web\View */
/* @var $model backend\models\search\MessageSearch */
/* @var $form common\widgets\SearchForm */
?>
<div class="toolbar-searchs">
    <?php $form = SearchForm::begin([]); ?>

    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'user_type')->dropDownList(Message::getUserTypes()) ?>
    <?= $form->field($model, 'status')->label('消息状态')->dropDownList(Message::getStatus(), ['prompt' => null]) ?>
    <?= $form->field($model, 'created_at')->dateRange() ?>
    <?= $form->searchButtons() ?>
    <?php SearchForm::end(); ?>
</div>