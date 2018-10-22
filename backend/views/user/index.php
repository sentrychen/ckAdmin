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
                     <?=$this->render('_search', ['model' => $searchModel]); ?>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
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
                            }
                        ],
                        [
                            'class' => DateColumn::class,
                            'attribute' => 'created_at'
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
                            'template' => '{view} {update}',
                        ],
                    ]
                ]); ?>
            </div>
        </div>
    </div>
</div>