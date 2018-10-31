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

use backend\models\UserLoginLog;
use common\grid\DateColumn;
use common\grid\GridView;
use yii\widgets\Pjax;

?>

<div class="row">
    <div class="col-sm-12">
        <?php Pjax::begin(['id' => 'logPjax']); ?>
        <div class="toolbar clearfix">

            <?= $this->render('_search_loglist', ['model' => $searchModel]); ?>
        </div>


        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => null,
            'columns' => [

                [
                    'class' => DateColumn::class,
                    'attribute' => 'created_at'

                ],

                [
                    'attribute' => 'client_type',
                    'value' => function($model){
                        return UserLoginLog::getLoginClients($model->client_type);
                    }
                ],

                [
                    'attribute' => 'login_ip',
                ],

            ]
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>