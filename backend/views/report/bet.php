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

use common\grid\DateColumn;
use common\grid\GridView;

?>

<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <div class="toolbar clearfix">
                    <?= $this->render('_search_bet', ['model' => $searchModel]); ?>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'columns' => [

                        [
                            'attribute' => 'record_id',
                        ],
                        [
                            'attribute' => 'username',
                        ],
                        [
                            'attribute' => 'platform_id',
                            'value' => 'platform.name',
                            'label' => '游戏平台',
                        ],
                        [
                            'attribute' => 'game_type',
                            'value' => 'gameType.name'
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
                        ],
                        [
                            'attribute' => 'game_result',
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
            </div>
        </div>

    </div>
</div>