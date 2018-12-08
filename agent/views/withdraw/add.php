<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/7
 * Time: 15:52
 */

use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model backend\models\Withdraw */

$this->params['breadcrumbs'] = [
    ['label' => yii::t('app', '提现列表'), 'url' => Url::to(['index'])],
    ['label' => yii::t('app', '提现申请') . yii::t('app', '')],
];
?>
<?= $this->render('_apply_form', [
    'model' => $model,
    'available_amount'=>$agentAccount,
]) ?>
