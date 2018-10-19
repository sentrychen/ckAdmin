<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-21 14:32
 */
use yii\helpers\Url;

$this->params['breadcrumbs'] = [
    ['label' => '后台菜单', 'url' => Url::to(['index'])],
    ['label' => yii::t('app', 'Create') . '后台菜单'],
];
/**
 * @var $model agent\models\Menu
 */
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>