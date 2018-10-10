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

$this->title = '游戏设置';
$this->params['breadcrumbs'][] = '游戏设置';
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox float-e-margins">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'game_min_limit') ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'game_max_limit') ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'game_dogfall_min_limit') ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'game_dogfall_max_limit') ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'game_pair_min_limit') ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'game_pair_max_limit') ?>
                <div class="hr-line-dashed"></div>
                <?= $form->defaultButtons() ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
