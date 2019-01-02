<?php

namespace api\models;

use common\libs\Constants;
use Yii;


class Message extends \common\models\Message
{

    public function fields()
    {
        $fields = parent::fields();
        $fields['is_read'] = function ($model) {
            return $model->messageFlag ? $model->messageFlag->is_read : 0;
        };
        unset($fields['notify_obj'], $fields['user_type'], $fields['user_group'], $fields['is_deleted'], $fields['deleted_at']);
        return $fields;
    }

    public function getMessageFlag()
    {
        return $this->hasOne(MessageFlag::class, ['message_id' => 'id'])->onCondition(['user_id' => yii::$app->getUser()->getId(), MessageFlag::tableName() . '.user_type' => static::OBJ_MEMBER]);
    }

    public static function getUnreadCount()
    {

        $query = static::find()->joinWith('messageFlag')
            ->where([Message::tableName() . '.user_type' => static::OBJ_MEMBER, Message::tableName() . '.is_deleted' => Constants::YesNo_No])
            ->andWhere(['or', ['notify_obj' => [static::SEND_ONE, static::SEND_MULTI], MessageFlag::tableName() . '.is_read' => Constants::YesNo_No, MessageFlag::tableName() . '.is_deleted' => Constants::YesNo_No],
                ['notify_obj' => static::SEND_ALL, MessageFlag::tableName() . '.id' => null]]);

        return $query->count('*');

    }

}
