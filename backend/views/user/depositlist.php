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
 * @var $searchModel backend\models\search\UserDepositSearch
 * @var $total array
 */

use backend\models\UserDeposit;
use common\grid\DateColumn;
use common\grid\GridView;
use common\helpers\Util;
use yii\widgets\Pjax;

?>

<div class="row">
    <div class="col-sm-12">
        <?php Pjax::begin(['id' => 'depositPjax']); ?>
        <div class="toolbar clearfix">
            <?= $this->render('_search_depositlist', ['model' => $searchModel]); ?>
        </div>


        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => null,
            'showFooter' => true,
            'footerRowOptions' => ['style' => 'font-weight:bold;'],
            'columns' => [

                [
                    'attribute' => 'id',
                    'footer' => '合计',
                ],
                [
                    'attribute' => 'apply_amount',
                    'value' => function ($model) {
                        return Util::formatMoney($model->apply_amount, false);
                    },
                    'footer' => '<span class="label label-default">' . Util::formatMoney($totals['apply_amount'], false) . '</span>'
                ],
                [
                    'attribute' => 'confirm_amount',
                    'value' => function ($model) {
                        return Util::formatMoney($model->confirm_amount, false);
                    },
                    'footer' => '<span class="label label-default">' . Util::formatMoney($totals['confirm_amount'], false) . '</span>'
                ],

                [
                    'attribute' => 'pay_channel',
                    'value' => function($model){
                        return UserDeposit::getPayChannels($model->pay_channel);
                    }
                ],
                [
                    'attribute' => 'pay_username',
                ],
                [
                    'attribute' => 'pay_info',
                ],
                [
                    'attribute' => 'status',
                    'value' => function($model){
                        return UserDeposit::getStatuses($model->status);
                    }
                ],

                [
                    'attribute' => 'audit_by_username',
                ],
                [
                    'attribute' => 'audit_remark',
                ],
                [
                    'class' => DateColumn::class,
                    'attribute' => 'audit_at',
                ],
                [
                    'class' => DateColumn::class,
                    'attribute' => 'created_at'

                ],
            ]
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>
