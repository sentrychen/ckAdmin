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
use common\widgets\JsBlock;
use yii\helpers\Url;
use yii\helpers\Html;
use common\widgets\Bar;
use common\grid\CheckboxColumn;
use common\grid\ActionColumn;
use backend\models\AdminUser;

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
                    'template' => '{refresh} {create} {message}',
                    'buttons' => [
                        'message' => function () {
                            return Html::a('<i class="fa fa-send"></i> 发消息', 'javascript:void(0);', [
                                'title' => '发消息给选中的管理员',
                                'data-pjax' => '0',
                                'onclick' => 'sendMessage()',
                                'class' => 'btn btn-success btn-sm',
                            ]);
                        },
                    ]
                ]) ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'layout' => "{items}\n{pager}",
                    'columns' => [
                        [
                            'class' => CheckboxColumn::className(),
                        ],
                        [
                            'attribute' => 'username',
                        ],
                        [
                            'attribute' => 'role',
                            'label' => yii::t('app', 'Role'),
                            'value' => function ($model) {
                                /** @var $model backend\models\AdminUser */
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
                                if($model->status == AdminUser::STATUS_ACTIVE){
                                    return yii::t('app', 'Normal');
                                }else if( $model->status == AdminUser::STATUS_DELETED ){
                                    return yii::t('app', 'Disabled');
                                }
                            },
                            'filter' => AdminUser::getStatuses(),
                        ],
                        [
                            'class' => DateColumn::className(),
                            'attribute' => 'created_at',
                        ],
                        [
                            'class' => DateColumn::className(),
                            'attribute' => 'updated_at',
                        ],
                        [
                            'class' => ActionColumn::className(),
                            'buttons' => ['assignment' => $assignment],
                        ],
                    ]
                ]); ?>
            </div>
        </div>
    </div>
</div>

<?php JsBlock::begin() ?>
    <script type="text/javascript">
        function sendMessage() {
            let chk_value = [];
            let num = $('input[name="selection[]"]:checked').length;
            if (num == false) {
                layer.alert('请先选择要操作的记录!', {icon: 2});
                return false;
            }
            $('input[name="selection[]"]:checked').each(function () {
                chk_value.push($(this).val());
            });
            var ids = chk_value.join(',');
            layer.open({
                type: 2,
                title: '发送消息',
                shadeClose: true,
                shade: 0.8,
                area: ['801px', '550px'],
                content: "<?=Url::to(['message'])?>?ids=" + ids
            });
        }

    </script>
<?php JsBlock::end() ?>