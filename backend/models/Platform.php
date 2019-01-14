<?php

namespace backend\models;


use Yii;


class Platform extends \common\models\Platform
{

    public static function getPlatfromName(){
        $platForm = Platform::find()->where(['status' => Platform::STATUS_ENABLED])->orderBy('id asc')->all();
        return $platForm;
    }
}
