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
 * @var $searchModel backend\models\search\GameRecordSearch
 */

use common\grid\DateColumn;
use common\grid\GridView;
use backend\models\GameRecord;
use yii\helpers\Url;
use yii\helpers\Html;
use common\widgets\Bar;

$this->title = '投注记录';
$this->params['breadcrumbs'][] = '投注记录';

?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <?= Bar::widget([
                    'template' => '{refresh}',
                ]) ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'layout' => "{items}\n{pager}",
                    'columns' => [
                        'record_id', 'user_id', 'user_name', 'game_play_name',
                        [
                            'attribute' => 'game_time',
                            'format' => ['date', 'Y-M-d H:i:s'],
                        ],
                        'room_id', 'before_amount', 'after_amount', 'bet_coin', 'bet_result', 'win'
                    ]
                ]); ?>
            </div>
        </div>
    </div>
</div>