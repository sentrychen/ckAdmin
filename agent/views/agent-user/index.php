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
 * @var $searchModel backend\models\search\AgentUserSearch
 */

use common\grid\DateColumn;
use common\grid\GridView;
use yii\helpers\Url;
use yii\helpers\Html;
use common\widgets\Bar;
use common\grid\CheckboxColumn;
use common\grid\ActionColumn;
use backend\models\AgentUser;

$assignment = function ($url, $model) {
    return Html::a('<i class="fa fa-tablet"></i> ' . yii::t('app', 'Assign Roles'), Url::to([
        'assign',
        'uid' => $model['id']
    ]), [
        'title' => 'assignment',
        'class' => 'btn btn-white btn-sm'
    ]);
};

$this->title = "Admin Users";
$this->params['breadcrumbs'][] = yii::t('app', 'Admin Users');
?>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">
                <?= Bar::widget([
                    'template' => '{refresh} {create} {delete}'
                ]) ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'layout' => "{items}\n{pager}",
                    'columns' => [
                        [
                            'class' => CheckboxColumn::class,
                        ],
                        [
                            'attribute' => 'username',
                            'footer' => '合计'
                        ],
                        [
                            'attribute' => 'role',
                            'label' => yii::t('app', 'Role'),
                            'value' => function ($model) {
                                /** @var $model backend\models\AgentUser */
                                return $model->getRolesNameString();
                            },
                        ],
                        [
                            'attribute' => 'email',
                        ],
                        [
                            'attribute' => 'status',
                            'label' => yii::t('app', 'Status'),
                            'value' => function ($model) {
                                if ($model->status == AgentUser::STATUS_ACTIVE) {
                                    return yii::t('app', 'Normal');
                                } else if ($model->status == AgentUser::STATUS_DELETED) {
                                    return yii::t('app', 'Disabled');
                                }
                            },
                            'filter' => AgentUser::getStatuses(),
                        ],
                        [
                            'class' => DateColumn::class,
                            'attribute' => 'created_at',
                        ],
                        [
                            'class' => DateColumn::class,
                            'attribute' => 'updated_at',
                        ],
                        [
                            'class' => ActionColumn::class,
                            'buttons' => ['assignment' => $assignment],
                        ],
                    ]
                ]); ?>
            </div>
        </div>
    </div>
</div>