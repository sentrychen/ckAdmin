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

use common\widgets\Bar;
use common\widgets\SearchForm;
use yii\jui\Tabs;
use yii\helpers\Url;
use yii\jui\AutoComplete;

$this->title = '会员管理';
$this->params['breadcrumbs'][] = '会员报表';

?>

<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <?= $this->render('/widgets/_ibox-title') ?>
            <div class="ibox-content">

                <div class="toolbar clearfix">
                    <?= Bar::widget([
                        'template' => '{refresh}',
                    ]) ?>
                    <div class="toolbar-searchs">
                        <?php $form = SearchForm::begin(['action' => ['report']]); ?>
                        <div class="form-group">
                            <label class="control-label" for="username">会员账号</label>
                            <?= AutoComplete::widget([
                                'options' => ['class' => 'form-control'],
                                'name' => 'username',
                                'value' => $username,
                                'clientOptions' => [
                                    'source' => Url::to(['user/search']),
                                    'minLength' => '2',
                                ],
                            ]) ?>
                        </div>
                        <?= $form->searchButtons(false) ?>
                        <?php SearchForm::end(); ?>
                    </div>
                </div>
                <?php
                if ($model) {
                    echo Tabs::widget([
                        'items' => [
                            [
                                'label' => '会员详情',
                                'content' => $this->render('view', ['model' => $model]),
                                'active' => true
                            ],
                            [
                                'label' => '投注记录',
                                'content' => 'Anim pariatur cliche...',
                            ],
                            [
                                'label' => '上下分记录',
                                'content' => 'Anim pariatur cliche...',
                            ],
                            [
                                'label' => '存款记录',
                                'content' => 'Anim pariatur cliche...',
                            ],
                            [
                                'label' => '取款记录',
                                'content' => 'Anim pariatur cliche...',
                            ],
                            [
                                'label' => '登陆日志',
                                'content' => 'Anim pariatur cliche...',
                            ],

                        ],
                    ]);
                }
                ?>
            </div>
        </div>
    </div>
</div>
