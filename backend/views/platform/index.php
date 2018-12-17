<?php

use backend\models\Platform;
use common\widgets\Bar;
use common\grid\ActionColumn;
use common\grid\GridView;
use common\helpers\Util;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PlatformSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '游戏平台管理';
$this->params['breadcrumbs'][] = '游戏平台管理';
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <?= Bar::widget([
                    'template' => '{refresh} {create} ',
                ]) ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'columns' => [
                        'id',
                        'name',
                        'code',
                        'api_host',
                        [
                            'attribute' => 'account.available_amount',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Util::formatMoney($model->account->available_amount, false);
                            }
                        ],
                        [
                            'attribute' => 'account.frozen_amount',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Util::formatMoney($model->account->frozen_amount, false);
                            }
                        ],

                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                $status = Platform::getStatuses();
                                return isset($status[$model->status]) ? $status[$model->status] : "异常";
                            }
                        ],

                        ['class' => ActionColumn::className(),
                            'template' => '{update} ',
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
