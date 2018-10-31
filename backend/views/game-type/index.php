<?php

use common\widgets\Bar;
use common\grid\{
    CheckboxColumn, ActionColumn, GridView
};


/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\GameTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '游戏类型';
$this->params['breadcrumbs'][] = '游戏类型';
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
                        'name_en',
                        ['class' => ActionColumn::className(),
                            'template' => '{update} {delete}',
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
