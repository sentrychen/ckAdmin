<?php

use backend\models\Platform;
use backend\models\RebateLevel;
use backend\models\XimaLevel;
use common\libs\Constants;
use common\widgets\ActiveForm;
use common\widgets\JsBlock;
use yii\helpers\Html;

//use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\XimaPlan */
/* @var $form common\widgets\ActiveForm */
?>
    <style>
        #agent-form td .form-group {
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
                    <table id="agent-form" class="table table-bordered">
                        <tr>
                            <td rowspan="2" width="150"
                                align="center"><?= Html::a('<i class="fa fa-plus"></i> 增加层级', 'javascript:void(0);', [
                                    'class' => 'btn btn-primary btn-sm add-level',
                                ]); ?>
                            </td>
                            <td rowspan="2" width="150">盈利额度达到</td>
                            <td rowspan="2" width="150">投注人数达到</td>
                            <td rowspan="2" width="150">每期返佣上限</td>
                            <td colspan="2">返佣率</td>
                        </tr>
                        <tr>
                            <?php
                            $platforms = Platform::find()->where(['status' => Platform::STATUS_ENABLED])->all();
                            foreach ($platforms as $platform) {

                                echo "<td>{$platform->name}</td>\n";
                            }

                            echo "</tr>\n";
                            if (empty($model->levels)) {
                                $levels = [new RebateLevel()];
                            } else {
                                $levels = $model->levels;
                            }

                            foreach ($levels as $idx => $level) {
                                echo "<tr class='tr-level' id='tr-{$idx}'>\n";
                                echo "<td align='center'>\n";
                                echo Html::a('<i class="fa fa-minus"></i> 删除层级', 'javascript:void(0);', [
                                    'class' => 'btn btn-danger btn-sm del-level',
                                ]);
                                echo "</td>\n";
                                echo "<td align='left'>\n";
                                if ($level->id)
                                    echo Html::activeHiddenInput($level, '[tr-' . $idx . ']id');
                                echo $form->field($level, '[tr-' . $idx . ']profit_amount', ['template' => "{input}\n{error}"])->label('')->textInput(['value' => $level->profit_amount ? number_format($level->profit_amount, 2, '.', '') : '']);

                                echo "</td>\n";
                                echo "<td>\n";

                                echo $form->field($level, '[tr-' . $idx . ']bet_user_num', ['template' => "{input}\n{error}"])->label('')->textInput(['value' => $level->bet_user_num ? $level->bet_user_num : '']);
                                echo "</td>\n";
                                echo "<td>\n";

                                echo $form->field($level, '[tr-' . $idx . ']rebate_limit', ['template' => "{input}\n{error}"])->label('')->textInput(['value' => $level->rebate_limit ? number_format($level->rebate_limit, 2, '.', '') : '']);
                                echo "</td>\n";
                                foreach ($platforms as $platform) {
                                    $rateModel = $level->getRate($platform->id);
                                    if (!$rateModel->id) {
                                        $rateModel->loadDefaultValues();
                                    }
                                    echo "<td>\n";
                                    echo $form->field($rateModel, '[tr-' . $idx . '][' . $platform->id . ']rebate_rate', ['template' => "{input}\n{error}"])->label('')->textInput(['afterAddon' => '%', 'value' => $rateModel->rebate_rate * 100]);

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
        $(function () {

            $('#agent-form').on('click', 'a.add-level', function () {
                if ($('#agent-form').find('tr.tr-level').length > 4) {
                    layer.alert('不能超过5个层级');
                    return false;
                }
                var $tr = $('#agent-form').find('tr.tr-level').last();

                var $idx = +$tr.attr('id').substr(3);
                var reg = new RegExp('tr-' + $idx, "g");

                $tr.after($tr[0].outerHTML.replace(reg, 'tr-' + (+$idx + 1)));
                $('#tr-' + (+$idx + 1)).find('input:text,input:hidden').val('');

            });

            $('#agent-form').on('click', 'a.del-level', function () {

                if ($('#agent-form').find('tr.tr-level').length == 1) {
                    layer.alert('不能删除最后一个层级');
                    return false;
                }
                $(this).closest('tr.tr-level').remove();
            });

        });


    </script>
<?php JsBlock::end() ?>