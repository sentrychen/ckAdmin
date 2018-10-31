<?php

use common\widgets\Bar;
use common\grid\CheckboxColumn;
use common\grid\ActionColumn;
use common\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PlatformSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '游戏平台管理';
$this->params['breadcrumbs'][] = '游戏平台管理';
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <?= Bar::widget([
                    'template' => '{refresh} {create} ',
                ]) ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'columns' => [
                        'id',
                        'name',
                        'code',
                        'api_host',

                        'login_url:url',
                        'status',

                        ['class' => ActionColumn::className(),],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
