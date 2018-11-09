<?php

use backend\models\CompanyBank;
use common\grid\ActionColumn;
use common\grid\CheckboxColumn;
use common\grid\GridView;
use common\widgets\Bar;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CompanyBankSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '银行卡管理';
$this->params['breadcrumbs'][] = '银行卡管理';
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <div class="toolbar clearfix">
                    <?= Bar::widget([
                        'template' => '{refresh} {create} ',
                    ]) ?>
                    <?= $this->render('_search', ['model' => $searchModel]); ?>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => null,
                    'columns' => [
                        ['class' => CheckboxColumn::className()],

                        'id',
                        'bank_username',
                        'bank_account',
                        'bank_name',
                        [
                            'attribute' => 'card_type',
                            'value' => function ($model) {

                                return CompanyBank::getCardTypes($model->card_type);
                            }
                        ],
                        [
                            'attribute' => 'status',
                            'value' => function ($model) {

                                return CompanyBank::getStatuses($model->status);
                            }
                        ],
                        [
                            'class' => ActionColumn::class,
                            'template' => '{view-layer} {update}',
                        ],
                    ],

                ]); ?>
            </div>
        </div>
    </div>
</div>
