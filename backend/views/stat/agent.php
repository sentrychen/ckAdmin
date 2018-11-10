<?php

use common\widgets\Bar;
use common\grid\CheckboxColumn;
use common\grid\ActionColumn;
use common\grid\GridView;
use common\grid\DateColumn;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\AgentDailySearch
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '代理日报';
$this->params['breadcrumbs'][] = '代理日报';
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <div class="toolbar clearfix">

                    <?= $this->render('_agent_search', ['model' => $searchModel]); ?>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'columns' => [
                        'ymd',
                        ['attribute' => 'agent_id', 'value' => 'agent.username', 'label' => '代理名称'],
                        'dnu', 'dau', 'ndu', 'nda', 'dbu', 'dbo', 'dba', 'ddu', 'dda', 'dwu', 'dwa', 'dpa', 'dla', 'dna'
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
