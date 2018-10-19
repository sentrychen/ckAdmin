<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-24 12:51
 */

use yii\helpers\Url;

$this->params['breadcrumbs'] = [
    ['label' => '会员管理', 'url' => Url::to(['index'])],
    ['label' => yii::t('app', 'Update') . '会员']
];
/**
 * @var $model agent\models\User
 */
?>
<?= $this->render('_form', [
    'model' => $model,
]);
