<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-24 12:51
 */
use yii\helpers\Url;

$this->params['breadcrumbs'] = [
    ['label' => '会员列表', 'url' => Url::to(['index'])],
    ['label' => '编辑会员'],
];
/**
 * @var $model agent\models\User
 */
?>
<?= $this->render('_form', [
    'model' => $model,
]);
