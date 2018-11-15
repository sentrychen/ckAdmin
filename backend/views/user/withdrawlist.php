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
 * @var $searchModel backend\models\search\WithdrawSearch
 * @var $total array
 */

use backend\models\Withdraw;
use common\grid\DateColumn;
use common\grid\GridView;
use yii\widgets\Pjax;

?>

<div class="row">
    <div class="col-sm-12">
        <?php Pjax::begin(['id' => 'withdrawPjax']); ?>
        <div class="toolbar clearfix">
            <div class="pull-left" style="line-height:44px">
                合计取款 <span class="label label-warning"><?= Yii::$app->formatter->asCurrency($total) ?></span>
            </div>
            <?= $this->render('_search_withdrawlist', ['model' => $searchModel]); ?>
        </div>


        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => null,
            'columns' => [

                [
                    'attribute' => 'id',
                ],
                [
                    'attribute' => 'apply_amount',
                    'format' => 'currency',
                ],
                [
                    'attribute' => 'transfer_amount',
                    'format' => 'currency',
                ],
                [
                    'attribute' => 'status',
                    'value' => function($model){
                        return Withdraw::getStatuses($model->status);
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
