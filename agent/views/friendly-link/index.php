<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-21 14:14
 */

/**
 * @var $this yii\web\View
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $searchModel backend\models\search\FriendlyLinkSearch
 */

use common\grid\DateColumn;
use common\grid\GridView;
use common\grid\SortColumn;
use common\grid\StatusColumn;
use common\widgets\Bar;
use yii\helpers\Html;
use common\grid\CheckboxColumn;
use common\grid\ActionColumn;
use common\libs\Constants;

$this->title = "Friendly Links";
$this->params['breadcrumbs'][] = yii::t('app', 'Friendly Links');
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <?= Bar::widget() ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        [
                            'class' => CheckboxColumn::class,
                        ],
                        [
                            'attribute' => 'name'
                        ],
                        [
                            'attribute' => 'url',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Html::a($model->url, $model->url, ['target' => '_blank']);
                            }
                        ],
                        [
                            'class' => SortColumn::class
                        ],
                        [
                            'class' => StatusColumn::class,
                            'filter' => Constants::getYesNoItems(),
                        ],
                        [
                            'class' => DateColumn::class,
                            'attribute' => 'created_at',
                        ],
                        [
                            'class' => DateColumn::class,
                            'attribute' => 'updated_at',
                        ],
                        [
                            'class' => ActionColumn::class,
                        ]
                    ]
                ]) ?>
            </div>
        </div>
    </div>
</div>