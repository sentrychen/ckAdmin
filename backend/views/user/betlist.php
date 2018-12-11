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
 * @var $searchModel backend\models\search\BetListSearch
 * @var $total array
 */

use backend\models\BetList;
use common\grid\DateColumn;
use common\grid\GridView;
use yii\widgets\Pjax;

?>

<div class="row">
    <div class="col-sm-12">
        <?php Pjax::begin(['id' => 'betPjax']); ?>
        <div class="toolbar clearfix">
            <div class="pull-left" style="line-height:44px">
                投注总额 <span class="label label-warning"><?=Yii::$app->formatter->asCurrency($total['betAmount'])?></span>
                合计赢输 <span class="label label-warning"><?=Yii::$app->formatter->asCurrency($total['profit'])?></span>
            </div>
            <?= $this->render('_search_betlist', ['model' => $searchModel]); ?>
        </div>


        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => null,
            'columns' => [

                [
                    'attribute' => 'record_id',
                ],
                [
                    'attribute' => 'platform_id',
                    'value' =>'platform.name',
                    'label' =>'游戏平台',
                ],
                [
                    'attribute' => 'game_type',
                    'value' =>'gameType.name'
                ],
                [
                    'attribute' => 'table_no',
                ],
                [
                    'attribute' => 'period_boot',
                ],
                [
                    'attribute' => 'period_round',
                ],
                [
                    'attribute' => 'bet_amount',
                    'format' => 'currency',
                ],
                [
                    'attribute' => 'bet_record',
                    'format' => 'raw',
                    'value' => function ($model) {
                        $records = explode(',', $model->bet_record);
                        $tags = '';
                        foreach ($records as $record) {
                            if ($record)
                                $tags .= BetList::recordLabels($record) . ' ';
                        }
                        return $tags;
                    },
                ],
                [
                    'attribute' => 'game_result',
                    'format' => 'raw',
                    'value' => function ($model) {
                        $records = explode(',', $model->game_result);
                        $tags = '';
                        foreach ($records as $record) {
                            if ($record)
                                $tags .= BetList::recordLabels($record) . ' ';
                        }
                        return $tags;
                    },
                ],
                [
                    'attribute' => 'profit',
                    'format' => 'currency',
                ],
                [
                    'attribute' => 'amount_before',
                    'format' => 'currency',
                ],
                [
                    'attribute' => 'amount_after',
                    'format' => 'currency',
                ],
                [
                    'attribute' => 'xima',
                    'format' => 'currency',
                ],
                [
                    'class' => DateColumn::class,
                    'attribute' => 'bet_at'
                ],
            ]
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>
