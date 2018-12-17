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
 * @var $searchModel backend\models\search\UserAccountRecordSearch
 * @var $total array
 */

use backend\models\UserAccountRecord;
use common\grid\DateColumn;
use common\grid\GridView;
use yii\widgets\Pjax;
use common\helpers\Util;

$this->title = '交易记录';
$this->params['breadcrumbs'][] = '会员交易记录';

?>

<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <div class="toolbar clearfix">
                    <div class="pull-left" style="line-height:44px">
                        合计收入 <span
                                class="label label-warning"><?= Yii::$app->formatter->asCurrency($total['inAmount']) ?></span>
                        合计支出 <span
                                class="label label-warning"><?= Yii::$app->formatter->asCurrency($total['outAmount']) ?></span>
                    </div>
                    <?= $this->render('_search_tradelist', ['model' => $searchModel]); ?>
                </div>


                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'columns' => [
                        'user.username',
                        [
                            'attribute' => 'agent_name',
                            'value' => 'user.inviteAgent.username',
                            'label' => '所属代理',
                        ],
                        [
                            'attribute' => 'trade_no',
                        ],
                        [
                            'attribute' => 'trade_type_id',
                            'value' => 'tradeType.name'
                        ],
                        [
                            'attribute' => 'switch',
                            'value' => function ($model) {
                                return UserAccountRecord::getSwitchStatus($model->switch);
                            }

                        ],


                        [
                            'attribute' => 'amount',
                            'format' => 'raw',
                            'value' => function ($searchModel) {
                                return Util::formatMoney($searchModel->amount, false);
                            }
                        ],

                        [
                            'attribute' => 'after_amount',
                            'format' => 'raw',
                            'value' => function ($searchModel) {
                                return Util::formatMoney($searchModel->after_amount, false);
                            }
                        ],
                        [
                            'attribute' => 'remark',
                        ],
                        [
                            'class' => DateColumn::class,
                            'attribute' => 'created_at'

                        ],
                    ]
                ]); ?>
            </div>
        </div>
    </div>
</div>