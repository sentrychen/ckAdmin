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
 * @var $searchModel backend\models\search\UserSearch
 */


use backend\models\User;
use yii\helpers\Url;
use yii\helpers\Html;
use backend\widgets\Bar;
use common\grid\CheckboxColumn;
use common\grid\ActionColumn;
use common\grid\DateColumn;
use common\grid\GridView;

$this->title = 'Users';
$this->params['breadcrumbs'][] = yii::t('app', 'Users');

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
                            'attribute' => 'status',
                            'value' => function ($model) {
                                $status = User::getStatuses();
                                return isset($status[$model->status]) ? $status[$model->status] : "异常";
                            },
                            'filter' => User::getStatuses(),
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
                            'attribute' => 'userStat.login_number',
                        ],
                        [
                            'attribute' => 'userStat.oneline_status',
                        ],
                        [
                            'attribute' => 'userStat.available_amount',
                        ],
                        [
                            'attribute' => 'userStat.deposit_amount',
                        ],
                        [
                            'attribute' => 'userStat.withdrawal_amount',
                        ],
                        [
                            'attribute' => 'userStat.bet_amount',
                        ],


                        [
                            'class' => ActionColumn::class,
                            'template' => '{update}',
                        ],
                    ]
                ]); ?>
            </div>
        </div>
    </div>
</div>