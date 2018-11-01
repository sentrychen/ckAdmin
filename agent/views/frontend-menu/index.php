<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-21 14:14
 */

/**
 * @var $this yii\web\View
 * @var $dataProvider agent\models\Menu
 */

use common\grid\DateColumn;
use common\grid\GridView;
use common\grid\SortColumn;
use common\grid\StatusColumn;
use common\widgets\Bar;
use agent\models\Menu;
use yii\helpers\Html;
use yii\helpers\Url;
use common\grid\CheckboxColumn;
use common\grid\ActionColumn;

$this->title = "Frontend Menus";
$this->params['breadcrumbs'][] = yii::t('app', 'Frontend Menus');
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <?= Bar::widget() ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'layout' => '{items}',
                    'columns' => [
                        [
                            'class' => CheckboxColumn::class,
                        ],
                        [
                            'attribute' => 'name',
                            'label' => yii::t('app', 'Name'),
                            'format' => 'html',
                            'value' => function ($model, $key, $index, $column) {
                                $return = '';
                                for ($i = 0; $i < $model['level']; $i++) {
                                    $return .= "&nbsp;&nbsp;&nbsp;&nbsp;";
                                }
                                return $return . $model['name'];
                            }
                        ],
                        [
                            'attribute' => 'icon',
                            'label' => yii::t('app', 'Icon'),
                            'format' => 'html',
                            'value' => function ($model) {
                                return "<i class=\"fa {$model['icon']}\"></i>";
                            }
                        ],
                        [
                            'attribute' => 'url',
                            'label' => yii::t('app', 'Url'),
                        ],
                        [
                            'class' => SortColumn::class,
                            'label' => yii::t('app', 'Sort')
                        ],
                        [
                            'attribute' => 'is_display',
                            'class' => StatusColumn::class,
                            'label' => yii::t('app', 'Is Display'),
                            'formName' => (new Menu)->formName() . '[is_display]',
                        ],
                        [
                            'class' => DateColumn::class,
                            'attribute' => 'created_at',
                            'label' => yii::t('app', 'Created At'),
                        ],
                        [
                            'class' => DateColumn::class,
                            'attribute' => 'updated_at',
                            'label' => yii::t('app', 'Updated At'),
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
                            'width' => '190px'
                        ]
                    ]
                ]) ?>
            </div>
        </div>
    </div>
</div>