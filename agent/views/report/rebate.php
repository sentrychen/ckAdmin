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
 * @var $searchModel backend\models\search\RebateSearch
 */

use backend\grid\DateColumn;
use backend\grid\GridView;
use backend\models\Rebate;
use yii\helpers\Url;
use yii\helpers\Html;
use backend\widgets\Bar;

$this->title = '返佣明细';
$this->params['breadcrumbs'][] = '返佣明细';

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
                        'id',
                        'ym',
                        'agent_id',
                        'agent_name',
                        'agent_level',
                        'self_bet_amount',
                        'sub_bet_amount',
                        'self_profit_loss',
                        'sub_profit_loss',
                        'total_sub_amount',
                        'cur_sub_amount',
                        'cur_rebate_amount',
                        'total_rebate_amount'
                    ]
                ]); ?>
            </div>
        </div>
    </div>
</div>