<?php

use backend\models\Task;
use common\widgets\Bar;
use common\grid\CheckboxColumn;
use common\grid\ActionColumn;
use common\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '任务列表';
$this->params['breadcrumbs'][] = '任务列表';
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
                    <?=$this->render('_search', ['model' => $searchModel]); ?>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                   // 'filterModel' => $searchModel,
                    'filterModel' => null,
                    'columns' => [

                        'id',
                        'name',
                        'route',
                        'crontab_str',
                        [
                            'attribute' => 'switch',
                            'format' => 'raw',
                            'value' => function ($model) {
                                $class = ['danger', 'primary'];
                                return '<span class="badge label-' . ($class[$model->switch] ?? 'info') . '">' . Task::getSwitchs($model->switch) . '</span>';
                            }
                        ],
                        [
                            'attribute' => 'status',
                            'format' => 'raw',
                            'value' => function ($model) {
                                $class = ['primary', 'danger'];
                                return '<span class="badge label-' . ($class[$model->status] ?? 'info') . '">' . Task::getStatuses($model->status) . '</span>';
                            }
                        ],
                        'last_run_at:date',
                        'next_run_at:date',
                        'exec_time',

                        ['class' => ActionColumn::className(),
                            'template' => '{update} {delete}',
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
