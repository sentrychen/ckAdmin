<?php

use common\widgets\Bar;
use common\grid\{
    CheckboxColumn, ActionColumn, GridView
};

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserDepositSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Deposits';
$this->params['breadcrumbs'][] = 'User Deposits';
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <?= Bar::widget() ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'columns' => [
                        ['class' => CheckboxColumn::className()],

                        'id',
                        'user_id',
                        'username',
                        'apply_amount',
                        'status',
                        // 'confirm_amount',
                        // 'audit_by_id',
                        // 'audit_by_username',
                        // 'audit_remark',
                        // 'audit_at',
                        // 'pay_channel',
                        // 'pay_username',
                        // 'pay_nickname',
                        // 'pay_info',
                        // 'save_bank_id',
                        // 'feedback',
                        // 'feedback_remark',
                        // 'feedback_at',
                        // 'updated_at',
                        // 'created_at',

                        ['class' => ActionColumn::className(),],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
