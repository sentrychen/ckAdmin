<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-24 12:51
 */

use yii\helpers\Url;

$this->params['breadcrumbs'] = [
    ['label' => '代理管理', 'url' => Url::to(['index'])],
    ['label' => yii::t('app', 'Update') . '代理'],
];
/**
 * @var $model agent\models\User
 */
?>
<?= $this->render('_form', [
    'model' => $model,
]);
