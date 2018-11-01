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

use agent\models\User;
use common\grid\DateColumn;
use common\grid\GridView;
use yii\helpers\Html;
use common\widgets\Bar;

use common\grid\ActionColumn;

$this->title = '会员';
$this->params['breadcrumbs'][] = '会员列表';

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
                            'attribute' => 'created_at'
                        ],
                        [
                            'class' => DateColumn::class,
                            'attribute' => 'userStat.last_login_at',
                        ],
                        [
                            'attribute' => 'userStat.login_number',
                            'format' => 'integer',
                        ],

                        [
                            'attribute' => 'account.available_amount',
                            'format' => 'currency',
                        ],
                        [
                            'attribute' => 'account.frozen_amount',
                            'format' => 'currency',
                        ],
                        [
                            'attribute' => 'userStat.bet_amount',
                            'format' => 'currency',
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