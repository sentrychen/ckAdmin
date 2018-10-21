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
use common\widgets\Bar;
use common\grid\ActionColumn;
use common\grid\DateColumn;
use common\grid\GridView;

$this->title = 'Users';
$this->params['breadcrumbs'][] = yii::t('app', 'Users');

?>
<style>
    .searchform .form-group{margin-top:10px;}
    .searchform {margin-bottom: 10px;}
</style>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <div class="pull-left" style="width:30%">
                <?= Bar::widget([
                    'template' => '{refresh} {create} ',
                ]) ?>
                </div>
                <div class="pull-right" style="width:70%">

                    <form role="form" class="form-inline searchform pull-right" method="get" >
                        <div class="form-group">
                            <label for="exampleInputEmail2">用户名 </label>
                            <input type="UserSearch[username]" placeholder="请输入用户名" id="exampleInputEmail2" class="form-control">
                        </div>

                        <button class="btn btn-info form-group" type="submit"><i class="fa fa-search"></i> 查询</button>
                    </form>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                   // 'layout' => "{items}\n{pager}",
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