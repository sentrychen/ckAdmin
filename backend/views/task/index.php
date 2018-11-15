<?php

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
                    <?= Bar::widget() ?>
                    <?=$this->render('_search', ['model' => $searchModel]); ?>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                   // 'filterModel' => $searchModel,
                    'filterModel' => null,
                    'columns' => [
                        ['class' => CheckboxColumn::className()],

                        'id',
                        'name',
                        'route',
                        'crontab_str',
                        'switch',
                        // 'status',
                        // 'run_times:datetime',
                        // 'error_times:datetime',
                        // 'last_run_at',
                        // 'next_run_at',
                        // 'exec_mem',
                        // 'exec_time:datetime',

                        ['class' => ActionColumn::className(),],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
