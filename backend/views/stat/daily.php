<?php

use common\widgets\Bar;
use common\grid\CheckboxColumn;
use common\grid\ActionColumn;
use common\grid\GridView;
use common\grid\DateColumn;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\DailySearch
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '系统日报';
$this->params['breadcrumbs'][] = '系统日报';
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <div class="toolbar clearfix">

                    <?= $this->render('_daily_search', ['model' => $searchModel]); ?>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'columns' => [
                        ['attribute' => 'ymd', 'value' => function ($model) {
                            return date('Y-m-d', strtotime($model->ymd));
                        }],
                        'dnu', 'dau', 'ndu', 'nda', 'dbu', 'dba', 'ddu', 'dda', 'dwu', 'dwa', 'dpa', 'dla'
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
