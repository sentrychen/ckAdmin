<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-21 14:14
 */

/**
 * @var $dataProvider yii\data\ArrayDataProvider
 * @var $model common\models\Category
 */

use common\grid\DateColumn;
use common\grid\GridView;
use common\grid\SortColumn;
use common\widgets\Bar;
use yii\helpers\Url;
use yii\helpers\Html;
use common\grid\CheckboxColumn;
use common\grid\ActionColumn;

$this->title = "Category";
$this->params['breadcrumbs'][] = yii::t('app', 'Category');
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <?= Bar::widget() ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        [
                            'class' => CheckboxColumn::class,
                        ],
                        [
                            'attribute' => 'id',
                        ],
                        [
                            'attribute' => 'name',
                            'label' => yii::t('app', 'Name'),
                            'format' => 'html',
                            'value' => function ($model, $key, $index, $column) {
                                return str_repeat('--', $model['level']) . $model['name'];
                            }
                        ],
                        [
                            'attribute' => 'alias',
                            'label' => yii::t('app', 'Alias'),
                        ],
                        [
                            'class' => SortColumn::class,
                            'label' => yii::t('app', 'Sort')
                        ],
                        [
                            'class' => DateColumn::class,
                            'label' => yii::t('app', 'Created At'),
                            'attribute' => 'created_at',
                        ],
                        [
                            'class' => DateColumn::class,
                            'label' => yii::t('app', 'Updated At'),
                            'attribute' => 'updated_at',
                        ],
                        [
                            'class' => ActionColumn::class,
                            'buttons' => [
                                'create' => function ($url, $model, $key) {
                                    return Html::a('<i class="fa  fa-plus" aria-hidden="true"></i> ' . Yii::t('app', 'Create'), Url::to([
                                        'create',
                                        'parent_id' => $model['id']
                                    ]), [
                                        'title' => Yii::t('app', 'Create'),
                                        'data-pjax' => '0',
                                        'class' => 'btn btn-white btn-sm J_menuItem',
                                    ]);
                                }
                            ],
                            'template' => '{create} {view-layer} {update} {delete}',
                        ]
                    ]
                ]) ?>
            </div>
        </div>
    </div>
</div>
