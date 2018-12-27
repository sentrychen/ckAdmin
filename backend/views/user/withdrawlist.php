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
 * @var $searchModel backend\models\search\UserWithdrawSearch
 * @var $total array
 */

use backend\models\UserWithdraw;
use common\grid\DateColumn;
use common\grid\GridView;
use common\helpers\Util;
use yii\widgets\Pjax;

?>

<div class="row">
    <div class="col-sm-12">
        <?php Pjax::begin(['id' => 'withdrawPjax']); ?>
        <div class="toolbar clearfix">
            <?= $this->render('_search_withdrawlist', ['model' => $searchModel]); ?>
        </div>


        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => null,
            'showFooter' => true,
            'footerRowOptions' => ['style' => 'font-weight:bold;'],
            'columns' => [

                [
                    'attribute' => 'id',
                ],
                [
                    'attribute' => 'apply_amount',
                    'value' => function ($model) {
                        return Util::formatMoney($model->apply_amount, false);
                    },
                    'footer' => '<span class="label label-default">' . Util::formatMoney($totals['apply_amount'], false) . '</span>'
                ],
                [
                    'attribute' => 'transfer_amount',
                    'value' => function ($model) {
                        return Util::formatMoney($model->transfer_amount, false);
                    },
                    'footer' => '<span class="label label-default">' . Util::formatMoney($totals['transfer_amount'], false) . '</span>'
                ],
                [
                    'attribute' => 'status',
                    'value' => function($model){
                        return UserWithdraw::getStatuses($model->status);
                    }
                ],

                [
                    'attribute' => 'audit_by_username',
                ],
                [
                    'attribute' => 'audit_remark',
                ],
                [
                    'attribute' => 'user_bank_id',
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
