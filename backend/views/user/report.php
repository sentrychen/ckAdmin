<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-23 17:51
 */

/**
 * @var $this yii\web\View
 * @var $model backend\models\User
 */

use yii\helpers\Url;
use yii\jui\Tabs;

$this->title = '会员详情';


$this->params['breadcrumbs'] = [
    ['label' => '会员列表', 'url' => Url::to(['index'])],
    ['label' => '会员报表：' . $model->username],
];


?>

<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <?php
                echo Tabs::widget([
                    'items' => [
                        [
                            'label' => '会员详情',
                            'content' => $this->render('view', ['model' => $model]),
                            'active' => true
                        ],
                        [
                            'label' => '投注记录',
                            'url' => ['user/bet-list', 'id' => $model->id],
                        ],
                        [
                            'label' => '交易记录',
                            'url' => ['user/trade-list', 'id' => $model->id],
                        ],
                        [
                            'label' => '存款记录',
                            'url' => ['user/deposit-list', 'id' => $model->id],
                        ],
                        [
                            'label' => '取款记录',
                            'url' => ['user/withdraw-list', 'id' => $model->id],
                        ],
                        [
                            'label' => '登陆日志',
                            'url' => ['user/log-list', 'id' => $model->id],
                        ],
                        [
                            'label' => '重置密码',
                            'url' => ['user/reset-pwd', 'user_id' => $model->id],
                        ],
                    ],
                ]);
                ?>
            </div>
        </div>
    </div>
</div>
