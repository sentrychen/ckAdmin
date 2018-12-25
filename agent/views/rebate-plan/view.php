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
    ['label' => '代理洗码方案', 'url' => Url::to(['index'])],
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

                        foreach ($model->levels as $level) {

                            echo "<tr class='tr-level'>\n";

                            echo "<td align='left'>\n";

                            echo $level->profit_amount ? Util::formatMoney($level->profit_amount, true) : '';

                            echo "</td>\n";
                            echo "<td>\n";
                            echo $level->rebate_limit ? $level->bet_user_num : '';
                            echo "</td>\n";
                            echo "<td>\n";
                            echo $level->rebate_limit ? Util::formatMoney($level->rebate_limit, true) : '';
                            echo "</td>\n";
                            foreach ($platforms as $platform) {
                                $rateModel = $level->getRate($platform->id);

                                echo "<td>\n";
                                echo Yii::$app->formatter->asPercent($rateModel->rebate_rate, 2);


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
