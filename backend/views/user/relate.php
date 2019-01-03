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
 * @var $userid int
 * @var $searchModel backend\models\search\UserRelateSearch
 */

use common\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = '会员详情';


$this->params['breadcrumbs'] = [
    ['label' => '会员列表', 'url' => Url::to(['index'])],
    ['label' => '关联账号'],
];


?>

<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <div class="toolbar clearfix">
                    <?= $this->render('_relate_search', ['model' => $searchModel]); ?>
                </div>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'columns' => [
                        [

                            'label' => '当前会员',
                            'format' => 'raw',
                            'value' => function ($model) use ($userid) {
                                if ($model->user_id == $userid) {
                                    $user = $model->user;
                                } else {
                                    $user = $model->relateUser;
                                }
                                return Html::a($user->username, Url::to(['report', 'username' => $user->username]), [
                                    'title' => $user->username,
                                    'data-pjax' => '0',
                                    'class' => 'openContab',
                                ]);
                            }
                        ],
                        [

                            'label' => '关联会员账号',
                            'format' => 'raw',
                            'value' => function ($model) use ($userid) {
                                if ($model->user_id == $userid) {
                                    $user = $model->relateUser;
                                } else {
                                    $user = $model->user;
                                }
                                return Html::a($user->username, Url::to(['report', 'username' => $user->username]), [
                                    'title' => $user->username,
                                    'data-pjax' => '0',
                                    'class' => 'openContab',
                                ]);
                            }
                        ],
                        [
                            'label' => '真实姓名',
                            'value' => function ($model) use ($userid) {
                                if ($model->user_id == $userid) {
                                    return $model->relateUser->realname;
                                } else {
                                    return $model->user->realname;
                                }
                            }
                        ],
                        [
                            'label' => '所属代理',
                            'format' => 'raw',
                            'value' => function ($model) use ($userid) {
                                if ($model->user_id == $userid) {
                                    $user = $model->relateUser;
                                } else {
                                    $user = $model->user;
                                }
                                if (!$user->inviteAgent) return '';
                                return Html::a($user->inviteAgent->username, Url::to(['agent/view', 'id' => $user->inviteAgent->id]), [
                                    'title' => '查看代理详情',
                                    'data-pjax' => '0',
                                    'class' => 'openContab',
                                ]);
                            }
                        ],
                        [
                            'label' => '注册日期',
                            'format' => 'date',
                            'value' => function ($model) use ($userid) {
                                if ($model->user_id == $userid) {
                                    return $model->relateUser->created_at;
                                } else {
                                    return $model->user->created_at;
                                }
                            }
                        ],

                        'ip',
                        'deviceid',
                        'remark',
                    ]
                ]); ?>
            </div>
        </div>
    </div>
</div>