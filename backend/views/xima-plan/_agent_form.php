<?php

use backend\models\Platform;
use backend\models\XimaLevel;
use common\libs\Constants;
use common\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\XimaPlan */
/* @var $form common\widgets\ActiveForm */
?>
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
                    <table class="table table-bordered">
                        <tr>
                            <td rowspan="2" width="150" align="center">
                                <?= Html::button('<i class="fa fa-plus"></i> 新增级别', [
                                    'id' => 'add-level',
                                    'class' => 'btn btn-primary btn-sm'
                                ]); ?>

                            </td>
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
                            if (empty($model->levels)) {
                                $levels = [new XimaLevel()];
                            } else
                                $levels = $model->levels;
                            foreach ($levels as $index => $level) {
                                echo "<tr class='tr-level'>\n";
                                echo "<td align=\"center\">" .
                                    Html::button('<i class="fa fa-minus"></i> 删除级别', [
                                        'id' => 'remove-level',
                                        'class' => 'btn btn-danger btn-sm'
                                    ]) . "</td>\n";
                                echo "<td align='left'>\n";

                                echo Html::activeTextInput($level, '[' . $index . ']bet_amount');
                                echo "</td>\n";
                                echo "<td>\n";
                                echo Html::activeTextInput($level, '[' . $index . ']xima_limit');
                                echo "</td>\n";
                                foreach ($platforms as $platform) {
                                    echo "<td>\n";
                                    echo Html::activeTextInput($level->getRate($platform->id), '[' . $index . '][' . $platform->id . ']rebate_rate') . '%';
                                    echo "</td>\n";
                                }
                                echo "</tr>\n";
                            }

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
<?php JsBlock::begin() ?>
    <script type="text/javascript">

    </script>

<?php JsBlock::end() ?>