<?php

namespace api\models;
use api\models\Message;
use Yii;

class MessageFlag extends \common\models\MessageFlag
{


    /* 新消息数量 */
    public static function userNoreadCount($user_id)
    {
        $count = static::find()
            ->where(['user_id' =>$user_id,'is_read'=>self::UN_READ])
            ->count();

        return $count;
    }

    public static function deleteUserMessage($id)
    {
        $model = static::findOne($id);
        $result = $model->delete();
        return $result;
    }
}
