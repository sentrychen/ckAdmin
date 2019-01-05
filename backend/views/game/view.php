<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PlatformGame */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Platform Games', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="platform-game-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'platform_id',
            'game_name',
            'game_name_en',
            'game_icon_url:url',
            'game_type_id',
            'status',
            'bet_amount',
            'profit',
            'bet_num',
            'bet_user_num',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
