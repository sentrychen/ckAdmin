<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-24 12:51
 */

use yii\helpers\Url;

$this->params['breadcrumbs'] = [
    ['label' => '代理列表', 'url' => Url::to(['index'])],
    ['label' => '编辑代理'],
];
/**
 * @var $model backend\models\User
 */
?>
<?= $this->render('_form', [
    'model' => $model,
]);
