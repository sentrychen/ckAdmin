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
use common\helpers\Util;
use yii\widgets\Pjax;

?>

<div class="row">
    <div class="col-sm-12">
        <?php Pjax::begin(['id' => 'tradePjax']); ?>
        <div class="toolbar clearfix">
            <?= $this->render('_search_tradelist', ['model' => $searchModel]); ?>
        </div>


        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => null,
            'showFooter' => true,
            'footerRowOptions' => ['style' => 'font-weight:bold;'],
            'columns' => [

                [
                    'attribute' => 'trade_no',
                    'footer' => '合计',
                ],
                [
                    'attribute' => 'trade_type_id',
                    'value' => function ($model) {
                        return \common\libs\Constants::getTradeTypeItems($model->trade_type_id);
                    }
                ],
                [
                    'attribute' => 'switch',
                    'value' => function($model){
                        return UserAccountRecord::getSwitchStatus($model->switch);
                    }

                ],


                [
                    'attribute' => 'amount',
                    'value' => function ($model) {
                        return Util::formatMoney($model->amount, false);
                    },
                    'footer' => '<span class="label label-default">' . Util::formatMoney($totals['amount'], false) . '</span>'
                ],

                [
                    'attribute' => 'after_amount',
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
        <?php Pjax::end(); ?>
    </div>
</div>
