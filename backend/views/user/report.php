<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-23 17:51
 */

/**
 * @var $this yii\web\View
 * @var model backend\models\User
 */

use backend\models\User;
use common\widgets\SearchForm;
use yii\helpers\Url;
use yii\helpers\Html;
use common\widgets\Bar;
use common\grid\ActionColumn;
use common\grid\DateColumn;
use common\grid\GridView;

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
                        <?php $form = SearchForm::begin(['action'=>['report']]); ?>

                        <?= $form->field($model, 'username')->textInput() ?>
                        <?=$form->searchButtons(false)?>
                        <?php SearchForm::end(); ?>

                    </div>

            </div>
        </div>
    </div>
</div>