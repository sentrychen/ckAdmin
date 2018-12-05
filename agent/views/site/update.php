<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-31 17:07
 */

use yii\helpers\Url;

$this->params['breadcrumbs'] = [
    ['label' => '修改密码'],
];
/**
 * @var $model backend\models\AgentUser
 */
?>
<?php

echo $this->render('_form-update-self', [
    'model' => $model
]);

?>
