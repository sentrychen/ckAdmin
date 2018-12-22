<?php

use backend\models\CompanyBank;
use common\grid\ActionColumn;
use common\grid\CheckboxColumn;
use common\grid\GridView;
use common\widgets\Bar;
use yii\helpers\Html;
use yii\helpers\Url;
use common\helpers\Util;
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
                            'width' => '20%',
                            'buttons' => [
                                'report' => function ($url, $model, $key) {
                                    return Html::a('<i class="fa fa-table"></i> 报表', Url::to(['/deposit/index?UserDepositSearch[save_bank_id]='.$model->id]), [
                                        'title' => '银行卡报表',
                                        'data-pjax' => '0',
                                        'class' => 'btn btn-info btn-sm openContab',
                                    ]);
                                },
                                'delete-bank' => function ($url, $model, $key) {
                                    return Html::a('<i class="fa fa-credit-card"></i> 删除', Url::to(['delete-bank','id'=>$model->id]), [
                                        'title' => '删除',
                                        'data-pjax' => '0',
                                        'class' => 'btn btn-warning btn-sm',
                                    ]);
                                },
                            ],
                            'template' => '{report} {view-layer} {update} {delete-bank}',
                        ],
                    ],

                ]); ?>
            </div>
        </div>
    </div>
</div>
