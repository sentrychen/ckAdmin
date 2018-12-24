<?php

use common\grid\ActionColumn;
use common\grid\GridView;
use common\libs\Constants;
use common\widgets\Bar;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\RebatePlanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '代理返佣方案';
$this->params['breadcrumbs'][] = '代理返佣方案';
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <div class="toolbar clearfix">
                    <?= Bar::widget([
                        'template' => '{refresh} {create} ',

                    ])
                    ?>
                    <?= $this->render('_search', ['model' => $searchModel]); ?>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'columns' => [
                        'name',
                        [
                            'attribute' => 'is_default',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return $model->is_default ? '<span class="fa fa-check text-success"></span>' : '';
                            }
                        ],
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                return Constants::getStatusItems($model->status);
                            }
                        ],
                        'created_at:date',
                        [
                            'class' => ActionColumn::class,
                            'template' => '{view} {update} {delete}',

                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
