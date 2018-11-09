<?php

use backend\models\Platform;
use common\widgets\Bar;
use common\grid\ActionColumn;
use common\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

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
                <div class="toolbar clearfix">
                    <?= Bar::widget([
                        'template' => '{refresh} {list} ',
                        'buttons' => [
                            'list' => function () {
                                return Html::a('<i class="fa fa-file-text-o"></i> 交易记录', Url::to(['report/platform-trade']), [
                                    'title' => '交易记录',
                                    'data-pjax' => '0',
                                    'class' => 'btn btn-white btn-sm openContab',
                                ]);
                            },
                        ]
                    ]) ?>
                    <?= $this->render('_search', ['model' => $searchModel]); ?>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'columns' => [
                        'name',
                        'code',
                        'account.available_amount:currency',
                        'account.frozen_amount:currency',

                        ['class' => ActionColumn::className(),
                            'template' => '{change-amount} ',
                            'buttons' => [
                                'change-amount' => function ($url, $model, $key) {
                                    return Html::a('<i class="fa fa-credit-card"></i> 额度调整', Url::to(['change-amount', 'platform_id' => $model->id]), [
                                        'title' => '平台额度调整',
                                        'data-pjax' => '0',
                                        'class' => 'btn btn-warning btn-sm',
                                    ]);
                                },

                            ]
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
