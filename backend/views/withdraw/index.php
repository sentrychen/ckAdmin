<?php

use common\widgets\Bar;
use common\grid\{
    CheckboxColumn, ActionColumn, GridView
};

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserWithdrawSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Withdraws';
$this->params['breadcrumbs'][] = 'User Withdraws';
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
                        // 'transfer_amount',
                        // 'audit_by_id',
                        // 'audit_by_username',
                        // 'audit_remark',
                        // 'audit_at',
                        // 'user_bank_id',
                        // 'bank_name',
                        // 'bank_account',
                        // 'apply_ip',
                        // 'updated_at',
                        // 'created_at',

                        ['class' => ActionColumn::className(),],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
