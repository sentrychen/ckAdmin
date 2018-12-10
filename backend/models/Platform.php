<?php

namespace backend\models;


use Yii;


class Platform extends \common\models\Platform
{

    public static function getPlatfromName(){
        $platForm = Platform::find()->where(['status'=>1])->orderBy('id asc')->all();
        return $platForm;
    }
}
