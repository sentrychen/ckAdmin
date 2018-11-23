<?php

namespace api\models;
use Yii;


class Message extends \common\models\Message
{
    public function getMessageFlag()
    {
        return $this->hasOne(MessageFlag::class, ['message_id' => 'id'])->onCondition(['user_id' => yii::$app->getUser()->getId(), MessageFlag::tableName() . '.user_type' => static::OBJ_MEMBER]);
    }
}
