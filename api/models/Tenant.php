<?php

namespace api\models;

use Yii;
use yii\helpers\Url;

class Tenant extends \common\models\Tenant
{
    public function fields()
    {
        $fields = parent::fields();
        unset($fields['name'], $fields['app_id'], $fields['app_secret']);
        $fields['app_logo'] = function ($model) {
            return Url::to('/admin' . $model->app_logo, true);
        };
        return $fields;
    }
}
