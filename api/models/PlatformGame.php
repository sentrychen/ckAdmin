<?php

namespace api\models;

use Yii;
use yii\helpers\Url;

class PlatformGame extends \common\models\PlatformGame
{
    public function fields()
    {
        $fields = parent::fields();
        unset($fields['status'], $fields['bet_amount'], $fields['profit'], $fields['bet_num'], $fields['bet_user_num'], $fields['created_at'], $fields['updated_at']);
        $fields['game_icon_url'] = function ($model) {
            return Url::to('/admin' . $model->game_icon_url, true);
        };
        $fields['platform_name'] = function ($model) {
            return $model->platform->name;
        };
        $fields['platform_code'] = function ($model) {
            return $model->platform->code;
        };
        return $fields;
    }
}
