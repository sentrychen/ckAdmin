<?php

use backend\models\Platform;
use backend\models\XimaLevel;
use common\libs\Constants;
use common\widgets\ActiveForm;
//use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\XimaPlan */
/* @var $form common\widgets\ActiveForm */
?>
<style>
    #user-form td .form-group {
        margin: 0;
    }
</style>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <?php $form = ActiveForm::begin([
                    'options' => [
                        'class' => 'form-horizontal'
                    ]
                ]); ?>
                <?= $form->field($model, 'name')->textInput() ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'status')->radioList(Constants::getStatusItems()) ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'is_default')->radioList(Constants::getYesNoItems()) ?>
                <div class="hr-line-dashed"></div>
                <?= $form->field($model, 'remark')->label('备注')->textarea() ?>
                <div class="hr-line-dashed"></div>
                <table id="user-form" class="table table-bordered">
                    <tr>
                        <td rowspan="2" width="150">有效投注额达到</td>
                        <td rowspan="2" width="150">每期洗码上限</td>
                        <td colspan="2">洗码率</td>
                    </tr>
                    <tr>
                        <?php
                        $platforms = Platform::find()->where(['status' => Platform::STATUS_ENABLED])->all();
                        foreach ($platforms as $platform) {

                            echo "<td>{$platform->name}</td>\n";
                        }

                        echo "</tr>\n";
                        if (empty($model->levels)) {
                            $level = new XimaLevel();
                        } else {
                            $level = current($model->levels);
                        }


                        echo "<tr class='tr-level'>\n";

                        echo "<td align='left'>\n";
                        echo $form->field($level, 'bet_amount', ['template' => "{input}\n{error}"])->label('')->textInput(['value' => $level->bet_amount ? number_format($level->bet_amount, 2, '.', '') : '']);

                        echo "</td>\n";
                        echo "<td>\n";

                        echo $form->field($level, 'xima_limit', ['template' => "{input}\n{error}"])->label('')->textInput(['value' => $level->xima_limit ? number_format($level->xima_limit, 2, '.', '') : '']);
                        echo "</td>\n";
                        foreach ($platforms as $platform) {
                            $rateModel = $level->getRate($platform->id);
                            if (!$rateModel->id) {
                                $rateModel->loadDefaultValues();
                            }
                            echo "<td>\n";
                            echo $form->field($rateModel, '[' . $platform->id . ']xima_type', ['template' => "{input}\n{error}"])->label('')->radioList(Constants::getXiMaTypes());
                            echo $form->field($rateModel, '[' . $platform->id . ']xima_rate', ['template' => "{input}\n{error}"])->label('')->textInput(['afterAddon' => '%', 'value' => $rateModel->xima_rate * 100]);

                            echo "</td>\n";
                        }
                        echo "</tr>\n";


                        ?>

                    </tr>
                </table>


                <div class="hr-line-dashed"></div>
                <?= $form->defaultButtons() ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>