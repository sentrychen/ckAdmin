<?php

use common\helpers\Util;
use common\widgets\Bar;
use common\grid\CheckboxColumn;
use common\grid\ActionColumn;
use common\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\TenantSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '租户管理';
$this->params['breadcrumbs'][] = '租户管理';
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
                        'app_name',
                        [
                            'attribute' => 'app_logo',
                            'format' => 'raw',
                            'value' => function ($model) {
                                if ($model->app_logo)
                                    return "<img style='max-width: 150px;max-height: 100px' src='" . Url::to('@web' . $model->app_logo) . "'>";
                                else
                                    return '-';
                            }
                        ],
                        'agent_id',
                        'app_id',
                        'app_secret',
                        'created_at:date',

                        ['class' => ActionColumn::className(),
                            'template' => '{update} {delete}',
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>