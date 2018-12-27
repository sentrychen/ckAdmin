<?php

namespace api\models;

use Yii;

class UserStat extends \common\models\UserStat
{

    /*
     * 添加或者更新用户状态
     * @param int $user_id 用户id
     * @reture bool
     *
     */
    public static function setRecord($user_id, $log_id)
    {
        $model = static::findOne($user_id);
        if(!$model){
            $model = new UserStat();
            $model->user_id = $user_id;
        }
        $data = [
            'last_login_at' => time(),
            'login_number' => $model->login_number+1,
            'online_status' => 1,
            'log_id' => $log_id,
            'last_login_ip' => Yii::$app->request->getUserIP(),
        ];
        $model->setAttributes($data);
        $model->save(false);
    }
}
