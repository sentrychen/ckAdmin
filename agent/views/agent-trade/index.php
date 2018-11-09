<?php


use common\grid\GridView;
use common\grid\DateColumn;
use common\models\AgentAccountRecord;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\AgentAccountRecordSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '代理交易记录';
$this->params['breadcrumbs'][] = '代理交易记录';
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <div class="toolbar clearfix">
                    <?= $this->render('_search', ['model' => $searchModel]); ?>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'columns' => [
                        [
                            'attribute' => 'agent_id',
                            'value' => 'agent.username',
                            'label' => '代理账号',
                        ],
                        'name',
                        [
                            'attribute' => 'amount',
                            'format' => 'currency',
                        ],
                        [
                            'attribute' => 'switch',
                            'value' => function ($model) {
                                return AgentAccountRecord::getSwitchStatus($model->switch);
                            }

                        ],
                        [
                            'attribute' => 'after_amount',
                            'format' => 'currency',
                        ],
                        'remark',
                        [
                            'class' => DateColumn::class,
                            'attribute' => 'created_at'
                        ],

                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>