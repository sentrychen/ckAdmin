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
/* @var $model backend\models\search\PlatformSearch */
/* @var $form common\widgets\SearchForm */
?>
<div class="toolbar-searchs">
    <?php $form = SearchForm::begin(['action' => ['amount'],]); ?>

    <?= $form->field($model, 'name')->textInput() ?>
    <?= $form->field($model, 'code')->textInput() ?>
    <?= $form->searchButtons(['amount']) ?>
    <?php SearchForm::end(); ?>
</div>