<?php

use common\widgets\Bar;
use common\grid\CheckboxColumn;
use common\grid\ActionColumn;
use common\grid\GridView;
use common\grid\DateColumn;
use common\helpers\Util;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PlatformDailySearch
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '平台日报';
$this->params['breadcrumbs'][] = '平台日报';
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <div class="toolbar clearfix">

                    <?= $this->render('_platform_search', ['model' => $searchModel]); ?>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'columns' => [
                        ['attribute' => 'ymd', 'value' => function ($model) {
                            return date('Y-m-d', strtotime($model->ymd));
                        }],
                        ['attribute' => 'platform_id', 'value' => 'platform.name'],
                        'dnu',
                        'dau',
                        [
                            'attribute' => 'dua',
                            'format' => 'raw',
                            'value' => function($searchModel){
                                return Util::formatMoney($searchModel->dua,false);
                            }
                        ],
                        [
                            'attribute' => 'dda',
                            'format' => 'raw',
                            'value' => function($searchModel){
                                return Util::formatMoney($searchModel->dda,false);
                            }
                        ],
                        'dbu',

                        [
                            'attribute' => 'dbo',
                            'format' => 'raw',
                            'value' => function($searchModel){
                                return Util::formatMoney($searchModel->dbo,false);
                            }
                        ],
                        [
                            'attribute' => 'dba',
                            'format' => 'raw',
                            'value' => function($searchModel){
                                return Util::formatMoney($searchModel->dba,false);
                            }
                        ],
                        [
                            'attribute' => 'dpa',
                            'format' => 'raw',
                            'value' => function($searchModel){
                                return Util::formatMoney($searchModel->dpa,false);
                            }
                        ],
                        [
                            'attribute' => 'dla',
                            'format' => 'raw',
                            'value' => function($searchModel){
                                return Util::formatMoney($searchModel->dla,false);
                            }
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
