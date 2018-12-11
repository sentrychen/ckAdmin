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
 * @var $searchModel backend\models\search\AgentXimaRecordSearch
 * @var $total array
 */

use common\grid\DateColumn;
use common\grid\GridView;
use common\libs\Constants;

?>

<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <div class="toolbar clearfix" style="width:100%;">
                    <?= $this->render('_search', ['model' => $searchModel]); ?>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'columns' => [

                        [
                            'attribute' => 'record_id',
                        ],
                        [
                            'attribute' => 'agent_id',
                            'value' => 'agent.username',
                            'label' => '代理',
                        ],
                        [
                            'attribute' => 'user_id',
                            'value' => 'user.username',
                            'label' => '投注玩家',
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
                            'attribute' => 'bet_amount',
                            'format' => 'currency',
                        ],
                        [
                            'attribute' => 'profit',
                            'format' => 'currency',
                        ],
                        [
                            'attribute' => 'xima_type',
                            'value' => function ($model) {
                                if ($model->xima_type == Constants::XIMA_ONE_SIDED)
                                    return '单边';
                                return '双边';
                            },
                        ],
                        [
                            'attribute' => 'xima_rate',
                            'format' => ['percent', 2],
                        ],
                        [
                            'attribute' => 'xima_amount',
                            'format' => 'currency',
                        ],
                        [
                            'attribute' => 'sub_xima_rate',
                            'format' => ['percent', 2],
                        ],
                        [
                            'attribute' => 'sub_xima_amount',
                            'format' => 'currency',
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
