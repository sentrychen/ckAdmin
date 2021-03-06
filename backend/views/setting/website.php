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

use common\widgets\ActiveForm;
use common\libs\Constants;

$this->title = yii::t('app', 'Website Setting');
$this->params['breadcrumbs'][] = yii::t('app', 'Website Setting');
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox float-e-margins">
            <?=$this->render('/widgets/_ibox-title')?>
            <div class="ibox-content">
                <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'website_title') ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'website_url') ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'seo_keywords') ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'seo_description')->textarea() ?>
                <div class="hr-line-dashed"></div>
                <?php
                $temp = \DateTimeZone::listIdentifiers();
                $timezones = [];
                foreach ($temp as $v) {
                    $timezones[$v] = $v;
                }
                ?>
                <?= $form->field($model, 'website_timezone')->dropDownList($timezones) ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'website_icp') ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'website_statics_script')->textarea() ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'website_status')->radioList(Constants::getWebsiteStatusItems()) ?>
                <div class="hr-line-dashed"></div>
                <?= $form->defaultButtons() ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
