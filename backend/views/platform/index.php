<?php

use common\widgets\Bar;
use common\grid\{
    CheckboxColumn, ActionColumn, GridView
};

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PlatformSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '游戏平台';
$this->params['breadcrumbs'][] = '游戏平台';
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <?= Bar::widget() ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'columns' => [
                        ['class' => CheckboxColumn::className()],

                        'id',
                        'name',
                        'code',
                        'api_host',
                        'app_id',
                        // 'app_secret',
                        // 'login_url:url',
                        // 'status',
                        // 'buy_amount',
                        // 'total_amount',
                        // 'available_amount',
                        // 'frozen_amount',
                        // 'updated_at',
                        // 'created_at',

                        ['class' => ActionColumn::className(),],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
