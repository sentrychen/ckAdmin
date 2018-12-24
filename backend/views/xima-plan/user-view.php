<?php

use backend\models\Platform;
use backend\models\XimaLevel;
use common\helpers\Util;
use common\libs\Constants;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CompanyBankSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $model->name;
$this->params['breadcrumbs'] = [
    ['label' => '用户洗码方案', 'url' => Url::to(['user'])],
    ['label' => $model->name],
];
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'name',
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                return Constants::getYesNoItems($model->status);
                            }
                        ],
                        [
                            'attribute' => 'is_default',
                            'value' => function ($model) {
                                return Constants::getYesNoItems($model->is_default);
                            }
                        ],
                        'remark',

                        'created_at:date',
                    ],
                ]) ?>
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

                        if ($model->levels) {


                            $level = current($model->levels);


                            echo "<tr class='tr-level'>\n";

                            echo "<td align='left'>\n";

                            echo $level->bet_amount ? Util::formatMoney($level->bet_amount, true) : '';

                            echo "</td>\n";
                            echo "<td>\n";
                            echo $level->ximi_limit ? Util::formatMoney($level->xima_limit, true) : '';
                            echo "</td>\n";
                            foreach ($platforms as $platform) {
                                $rateModel = $level->getRate($platform->id);

                                echo "<td>\n";
                                echo '洗码类型：' . Constants::getXimaTypes($rateModel->xima_type ?? Constants::XIMA_TWO_SIDED) . "<br>";
                                echo '洗码率：' . Yii::$app->formatter->asPercent($rateModel->xima_rate, 2) . '<br>';


                                echo "</td>\n";
                            }
                            echo "</tr>\n";
                        }

                        ?>

                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
