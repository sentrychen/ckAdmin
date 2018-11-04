<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2018-10-13 23:18
 */

use backend\models\Agent;
use backend\models\Notice;
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

    <?= $form->field($model, 'keyword')->label('关键词')->textInput() ?>

    <?= $form->field($model, 'user_type')->dropDownList(Notice::getUserTypes()) ?>
    <?= $form->field($model, 'is_deleted')->label('状态')->dropDownList(Notice::getStatus(), ['prompt' => null]) ?>
    <?= $form->field($model, 'created_at')->dateRange() ?>
    <?= $form->searchButtons() ?>
    <?php SearchForm::end(); ?>
</div>