<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-23 17:51
 */

/**
 * @var $this yii\web\View
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $searchModel backend\models\search\AgentSearch
 */

use common\grid\DateColumn;
use common\grid\GridView;
use common\grid\StatusColumn;
use backend\models\Agent;
use yii\helpers\Url;
use yii\helpers\Html;
use common\widgets\Bar;
use common\grid\ActionColumn;

$this->title = '代理列表';
$this->params['breadcrumbs'][] = '代理列表';

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
                    'filterModel' => null,
                    'columns' => [

                        [
                            'attribute' => 'username',
                        ],
                        [
                            'attribute' => 'parent.username',
                            'label' =>'上级代理',
                        ],
                        [
                            'attribute' => 'agent_level',
                            'format' =>'raw',
                            'value' =>function($model){
                                $class =['danger','danger','warning','info'];
                                return '<span class="badge label-' . ($class[$model->agent_level]??'info') . '">'.$model->agent_level.'</span>';
                            }
                        ],
                        [
                            'attribute' => 'realname',
                        ],
                        [
                            'attribute' => 'promo_code',
                        ],
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                $status = Agent::getStatuses();
                                return isset($status[$model->status]) ? $status[$model->status] : "异常";
                            },
                        ],
                        [
                            'class' => DateColumn::class,
                            'attribute' => 'created_at',

                        ],
                        [
                            'attribute' => 'rebate_rate',
                            'format' =>['percent',2],
                        ],
                        [
                            'attribute' => 'account.xima_amount',
                            'format'=>'currency',
                        ],
                        [
                            'attribute' => 'xima_rate',
                            'format' =>['percent',2],
                        ],
                        [
                            'attribute' => 'available_amount',
                            'format'=>'currency',

                        ],
                        [
                            'class' => ActionColumn::class,
                            'width' => '80',
                            'template' => '{view-layer} {update}',
                        ],
                    ]
                ]); ?>
            </div>
        </div>
    </div>
</div>