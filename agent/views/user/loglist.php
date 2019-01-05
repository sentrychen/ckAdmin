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
 * @var $searchModel backend\models\search\LoginLogSearch
 */

use agent\models\UserLoginLog;
use common\grid\DateColumn;
use common\grid\GridView;
use yii\widgets\Pjax;

$this->title = '登陆记录';
$this->params['breadcrumbs'][] = '会员登陆记录';

?>

<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <div class="toolbar clearfix">

                    <?= $this->render('_search_loglist', ['model' => $searchModel]); ?>
                </div>


                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'columns' => [
                        'user_id',
                        'user.username',
                        [
                            'attribute' => 'agent_name',
                            'value' => 'user.inviteAgent.username',
                            'label' => '所属代理',
                        ],
                        [
                            'class' => DateColumn::class,
                            'attribute' => 'created_at'

                        ],

                        [
                            'attribute' => 'login_ip',
                            'value' => function ($model) {
                                return long2ip($model->login_ip);
                            }
                        ],
                        [
                            'attribute' => 'device_type',
                            'value' => function ($model) {
                                $devices = UserLoginLog::getDeviceTypes();
                                return $devices[$model->device_type] ?? $model->device_type;
                            }
                        ],
                        [
                            'attribute' => 'client_type',
                            'value' => function ($model) {
                                $clients = UserLoginLog::getLoginClients();
                                return $clients[$model->client_type] ?? $model->client_type;
                            }
                        ],

                        'client_version',

                    ]
                ]); ?>

            </div>
        </div>
    </div>
</div>