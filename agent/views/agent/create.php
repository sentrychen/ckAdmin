<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-23 15:47
 */

use yii\helpers\Url;

$this->params['breadcrumbs'] = [
    ['label' => '代理管理', 'url' => Url::to(['index'])],
    ['label' => yii::t('app', 'Create') . '代理'],
];
/**
 * @var $model agent\models\User
 */
?>
<?= $this->render('_form', [
    'model' => $model,
]);
