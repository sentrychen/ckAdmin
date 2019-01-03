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

                                'delete' => function ($url, $model, $key) {
                                    return Html::a('<i class="glyphicon glyphicon-trash" aria-hidden="true"></i> ' . Yii::t('app', 'Delete'), Url::to(['delete-bank', 'id' => $model->id]), [
                                        'title' => Yii::t('app', 'Delete'),
                                        'data-confirm' => Yii::t('app', '您确定要删除吗?'),
                                        'data-method' => 'post',
                                        'data-pjax' => '0',
                                        'class' => 'btn btn-danger btn-sm',
                                    ]);
                                },
                            ],
                            'template' => '{report} {view-layer} {update} {delete}',
                        ],
                    ],

                ]); ?>
            </div>
        </div>
    </div>
</div>
