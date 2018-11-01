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
 * @var $searchModel backend\models\search\ArticleSearch
 */

use common\grid\DateColumn;
use common\grid\GridView;
use common\grid\SortColumn;
use yii\helpers\Url;
use common\libs\Constants;
use yii\helpers\Html;
use common\widgets\Bar;
use common\grid\CheckboxColumn;
use common\grid\ActionColumn;

$this->title = 'Pages';
$this->params['breadcrumbs'][] = yii::t('app', 'Pages');
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
                    'layout' => "{items}\n{pager}",
                    'columns' => [
                        [
                            'class' => CheckboxColumn::class,
                        ],
                        [
                            'attribute' => 'id',
                        ],
                        [
                            'class' => SortColumn::class
                        ],
                        [
                            'attribute' => 'title',
                            'format' => 'html',
                            'width' => '170',
                            'value' => function ($model, $key, $index, $column) {
                                return Html::a($model->title, 'javascript:void(0)', [
                                    'title' => $model->thumb,
                                    'class' => 'title'
                                ]);
                            }
                        ],
                        [
                            'attribute' => 'author_name',
                        ],
                        [
                            'label' => yii::t('app', 'Url'),
                            'format' => 'raw',
                            'value' => function ($model) {
                                return "<a target='_blank' href='" . yii::$app->params['site']['url'] . 'page/' . $model->sub_title . "'>" . yii::$app->params['site']['url'] . 'page/' . $model->sub_title . '</a>';
                            },
                        ],
                        [
                            'attribute' => 'status',
                            'format' => 'raw',
                            'value' => function ($model, $key, $index, $column) {
                                /** @var $model backend\models\Article */
                                return Html::a(Constants::getArticleStatus($model['status']), ['update', 'id' => $model['id']], [
                                    'class' => 'btn btn-xs btn-rounded ' . ($model['status'] == Constants::YesNo_Yes ? 'btn-info' : 'btn-default'),
                                    'data-confirm' => $model['status'] == Constants::YesNo_Yes ? Yii::t('app', 'Are you sure you want to cancel release?') : Yii::t('app', 'Are you sure you want to publish?'),
                                    'data-method' => 'post',
                                    'data-pjax' => '0',
                                    'data-params' => [
                                        $model->formName() . '[status]' => $model['status'] == Constants::YesNo_Yes ? Constants::YesNo_No : Constants::YesNo_Yes
                                    ]
                                ]);
                            },
                            'filter' => Constants::getArticleStatus(),
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
                            'buttons' => [
                                'comment' => function ($url, $model, $key) {
                                    return Html::a('<i class="fa  fa-commenting-o" aria-hidden="true"></i> ' . Yii::t('app', 'Comments'), Url::to([
                                        'comment/index',
                                        'CommentSearch[aid]' => $model->id
                                    ]), [
                                        'title' => Yii::t('app', 'Comments'),
                                        'data-pjax' => '0',
                                        'class' => 'btn btn-white btn-sm openContab',
                                    ]);
                                }
                            ],
                            'width' => '135',
                            'template' => '{view-layer} {update} {delete} {comment}',
                        ],
                    ]
                ]); ?>
            </div>
        </div>
    </div>
</div>