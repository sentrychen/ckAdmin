<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-12-05 13:00
 */

/**
 * @var $this yii\web\View
 * @var $dataProvider \yii\data\ActiveDataProvider
 */

use common\grid\DateColumn;
use common\grid\GridView;
use common\grid\SortColumn;
use common\grid\StatusColumn;
use common\libs\Constants;
use agent\models\User;
use common\widgets\Bar;
use common\grid\CheckboxColumn;
use common\grid\ActionColumn;

$this->title = 'Ad';
$this->params['breadcrumbs'][] = yii::t('app', 'Ad');
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <?= Bar::widget()?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'layout' => "{items}\n{pager}",
                    'columns' => [
                        [
                            'class' => CheckboxColumn::className(),
                        ],
                        [
                            'attribute' => 'name',
                        ],
                        [
                            'attribute' => 'input_type',
                            'value' => function($model){
                                return Constants::getAdTypeItems($model->input_type);
                            }
                        ],
                        [
                            'attribute' => 'ad',
                            'format' => 'raw',
                            'value' => function($model){
                                switch ($model->input_type){
                                    case Constants::AD_IMG:
                                        return "<img style='max-width: 200px;max-height: 150px' src='{$model->ad}'>";
                                    case Constants::AD_VIDEO:
                                        return "<video style='max-width: 200px;max-height: 150px' src='{$model->ad}' controls='controls'></video>";
                                    case Constants::AD_TEXT:
                                        return $model->ad;
                                }
                            }
                        ],
                        [
                            'attribute' => 'link',
                        ],
                        [
                            'attribute' => 'desc',
                        ],
                        [
                            'attribute' => 'autoload',
                            'class' => StatusColumn::className(),
                            'filter' => User::getStatuses(),
                        ],
                        [
                            'attribute' => 'sort',
                            'class' => SortColumn::className(),
                        ],
                        [
                            'class' => DateColumn::className(),
                            'attribute' => 'created_at',
                        ],
                        [
                            'class' => DateColumn::className(),
                            'attribute' => 'updated_at',
                        ],
                        [
                            'class' => ActionColumn::className(),
                            'width' => '190px'
                        ],
                    ]
                ]); ?>
            </div>
        </div>
    </div>
</div>