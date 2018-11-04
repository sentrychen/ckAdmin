<?php

use backend\models\Notice;
use common\widgets\Bar;
use common\grid\{
    CheckboxColumn, ActionColumn, GridView
};


/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\NoticeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Notices';
$this->params['breadcrumbs'][] = '系统公告';
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <div class="toolbar clearfix">
                    <?= Bar::widget([
                        'template' => '{refresh} {create} {delete} ',
                    ]) ?>
                    <?= $this->render('_search', ['model' => $searchModel]); ?>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'columns' => [
                        ['class' => CheckboxColumn::className()],

                        'id',
                        'content:raw',
                        [
                            'attribute' => 'user_type',
                            'value' => function ($model) {

                                return Notice::getUserTypes($model->user_type);
                            }
                        ],
                        'expire_at:date',
                        'set_top',

                        'publish_name',

                        'created_at:date',

                        ['class' => ActionColumn::className(),'width' => '120',
                            'template' => '{view-layer} {delete}'],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
