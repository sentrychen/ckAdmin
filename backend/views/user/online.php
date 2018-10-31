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

use common\grid\DateColumn;
use common\grid\GridView;

$this->title = 'Users';
$this->params['breadcrumbs'][] = '在线会员';

?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">


                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'columns' => [

                        [
                            'attribute' => 'id',
                        ],
                        [
                            'attribute' => 'username',
                        ],
                        [
                            'attribute' => 'nickname',
                        ],
                        [
                            'attribute' => 'agent_name',
                            'value' => 'inviteAgent.username',
                            'label' => '所属代理',
                        ],

                        [
                            'class' => DateColumn::class,
                            'attribute' => 'userStat.last_login_at',
                            'label' => '登陆时间',
                        ],
                        [
                            'attribute' => 'userStat.oneline_duration',
                            'format' => 'integer',
                        ],

                    ]
                ]); ?>
            </div>
        </div>
    </div>
</div>