<?php

use common\widgets\Bar;
use common\grid\{
    CheckboxColumn, ActionColumn, GridView
};


/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\NoticeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Notices';
$this->params['breadcrumbs'][] = 'Notices';
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
                        'content',
                        'notice_obj',
                        'expire_at',
                        'set_top',
                        // 'is_deleted',
                        // 'deleted_at',
                        // 'is_cancled',
                        // 'cancled_at',
                        // 'publish_by',
                        // 'publish_name',
                        // 'updated_at',
                        // 'created_at',

                        ['class' => ActionColumn::className(),],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
