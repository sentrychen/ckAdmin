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

use agent\models\UserLoginLog;
use common\grid\ActionColumn;
use common\grid\DateColumn;
use common\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Users';
$this->params['breadcrumbs'][] = '在线会员';

?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <div class="toolbar clearfix">
                    <?= $this->render('_online_search', ['model' => $searchModel]); ?>
                </div>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'columns' => [
                        [
                            'attribute' => 'user.username',
                            'format' => 'raw',
                            'value' => function ($model) {
                                return Html::a($model->user->username, Url::to(['report', 'username' => $model->user->username]), [
                                    'title' => $model->user->username . ' 详情',
                                    'data-pjax' => '0',
                                    'class' => 'openContab',
                                ]);
                            }
                        ],
                        [
                            'attribute' => 'user.realname',
                        ],
                        [
                            'attribute' => 'user.invite_agent_id',
                            'label' => '所属代理',
                            'format' => 'raw',
                            'value' => function ($model) {
                                if (!$model->user->inviteAgent) return '';
                                return Html::a($model->user->inviteAgent->username, Url::to(['agent/view', 'id' => $model->user->invite_agent_id]), [
                                    'title' => $model->user->inviteAgent->username . ' 详情',
                                    'data-pjax' => '0',
                                    'class' => 'openContab',
                                ]);
                            }
                        ],
                        'login_number',
                        'last_login_ip',
                        [
                            'attribute' => 'log.device_type',
                            'value' => function ($model) {
                                return UserLoginLog::getDeviceTypes($model->log->device_type);
                            }
                        ],

                        [
                            'attribute' => 'log.client_type',
                            'value' => function ($model) {
                                return UserLoginLog::getLoginClients($model->log->client_type);
                            }
                        ],
                        'log.client_version',
                        [
                            'class' => DateColumn::class,
                            'attribute' => 'last_login_at',
                            'label' => '登陆时间',
                        ],
                        [
                            'attribute' => 'online_duration',
                            'label' => '累计在线时长',
                            'format' => 'duration',
                        ],
                        [
                            'attribute' => 'duration',
                            'label' => '当前在线时长',
                            'value' => function ($model) {
                                return Yii::$app->formatter->asDuration(time() - $model->last_login_at);
                            }
                        ],

                    ]
                ]); ?>
            </div>
        </div>
    </div>
</div>