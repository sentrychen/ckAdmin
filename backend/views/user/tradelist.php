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

?>

<div class="row">
    <div class="col-sm-12">
        <?php Pjax::begin(['id' => 'tradePjax']); ?>
        <div class="toolbar clearfix">
            <div class="pull-left" style="line-height:44px">
                合计收入 <span class="label label-warning"><?=Yii::$app->formatter->asCurrency($total['inAmount'])?></span>
                合计支出 <span class="label label-warning"><?=Yii::$app->formatter->asCurrency($total['outAmount'])?></span>
            </div>
            <?= $this->render('_search_tradelist', ['model' => $searchModel]); ?>
        </div>


        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => null,
            'columns' => [

                [
                    'attribute' => 'trade_no',
                ],
                [
                    'attribute' => 'trade_type_id',
                    'value' =>'tradeType.name'
                ],
                [
                    'attribute' => 'switch',
                    'value' => function($model){
                        return UserAccountRecord::getSwitchStatus($model->switch);
                    }

                ],


                [
                    'attribute' => 'amount',
                    'format' => 'currency',
                ],

                [
                    'attribute' => 'after_amount',
                    'format' => 'currency',
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
