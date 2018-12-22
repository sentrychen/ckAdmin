<?php

use backend\models\CompanyBank;
use common\grid\ActionColumn;
use common\grid\CheckboxColumn;
use common\grid\GridView;
use common\libs\Constants;
use common\widgets\Bar;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CompanyBankSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户返佣方案';
$this->params['breadcrumbs'][] = '用户返佣方案';
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <div class="toolbar clearfix">
                    <?= Bar::widget([
                        'template' => '{refresh} {create} ',
                    ]) ?>
                    <?= $this->render('_search', ['model' => $searchModel]); ?>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'columns' => [
                        'name',
                        'agent.username',
                        [
                            'attribute' => 'is_default',
                            'value' => function ($model) {
                                return $model->is_default ? '<span class="fa fa-check"></span>' : '';
                            }
                        ],
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                return Constants::getStatusItems($model->status);
                            }
                        ],
                        [
                            'class' => ActionColumn::class,
                            'template' => '{view-layer} {update}',
                        ],
                    ],

                ]); ?>
            </div>
        </div>
    </div>
</div>
