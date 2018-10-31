<?php

use backend\models\Platform;
use common\widgets\Bar;
use common\grid\ActionColumn;
use common\grid\GridView;

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
                        'account.available_amount:currency',
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
