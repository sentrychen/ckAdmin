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
 * @var $searchModel backend\models\search\UserSearch
 */

use backend\grid\DateColumn;
use backend\grid\GridView;
use backend\models\AdminUser;
use backend\grid\ActionColumn;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Users';
$this->params['breadcrumbs'][] = '今日注册用户';
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'layout' => "{items}\n{pager}",
                    'columns' => [

                        [
                            'attribute' => 'id',
                        ],
                        [
                            'attribute' => 'username',
                        ],
                        [
                            'attribute' => 'email',
                        ],
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {
                                $status = AdminUser::getStatuses();
                                return isset($status[$model->status]) ? $status[$model->status] : "异常";
                            },
                            'filter' => AdminUser::getStatuses(),
                        ],
                        [
                            'class' => DateColumn::class,
                            'attribute' => 'created_at',
                        ],
                        [
                            'class' => ActionColumn::class,
                            'buttons' => array(
                                'updown' => function ($url, $model, $key) {
                                    return Html::a('<i class="fa  fa-sort" aria-hidden="true"></i> 上下分', Url::to(array(
                                        'user/index',
                                        'UserSearch[id]' => $model->id
                                    )), array(
                                        'title' => Yii::t('app', 'Comments'),
                                        'data-pjax' => '0',
                                        'class' => 'btn btn-white btn-sm openContab',
                                    ));
                                }
                            ),
                            'width' => '135',
                            'template' => '{update} {updown}',
                        ],

                    ]
                ]); ?>
            </div>
        </div>
    </div>
</div>