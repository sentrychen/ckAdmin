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

use backend\grid\DateColumn;
use backend\grid\GridView;
use backend\grid\StatusColumn;
use backend\models\Agent;
use yii\helpers\Url;
use yii\helpers\Html;
use backend\widgets\Bar;
use backend\grid\ActionColumn;

$this->title = 'Agents';
$this->params['breadcrumbs'][] = '代理列表';

?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <?= Bar::widget([
                    'template' => '{refresh} {create} ',
                ]) ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'layout' => "{items}\n{pager}",
                    'columns' => [

                        [
                            'attribute' => 'id',
                        ],
                        [
                            'attribute' => 'username',
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
                            'filter' => Agent::getStatuses(),
                        ],
                        [
                            'class' => DateColumn::class,
                            'attribute' => 'created_at',
                            'filter' => Html::activeInput('text', $searchModel, 'create_start_at', [
                                    'class' => 'form-control layer-date',
                                    'placeholder' => '',
                                    'onclick' => "laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'});"
                                ]) . Html::activeInput('text', $searchModel, 'create_end_at', [
                                    'class' => 'form-control layer-date',
                                    'placeholder' => '',
                                    'onclick' => "laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})"
                                ]),
                        ],
                        [
                            'attribute' => 'rebate_rate',
                            'value' => function ($model) {
                                return $model->rebate_rate * 100 . '%';
                            }
                        ],
                        [
                            'attribute' => 'xima_rate',
                            'value' => function ($model) {
                                return $model->xima_rate * 100 . '%';
                            }
                        ],
                        [
                            'attribute' => 'available_amount',
                            'value' => function ($model) {
                                return '￥' . number_format($model->available_amount, 2);
                            }

                        ],
                        [
                            'class' => ActionColumn::class,
                            'width' => '135',
                            'template' => '{view-layer} {update}',
                        ],
                    ]
                ]); ?>
            </div>
        </div>
    </div>
</div>