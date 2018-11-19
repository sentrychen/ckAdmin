<?php

use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model backend\models\Message */

?>
<?= $this->render('_form_message', [
    'model' => $model,
    'id_str' => $id_str
]) ?>