<?php

namespace backend\models;

use common\libs\Constants;
use common\models\MessageFlag;
use Yii;


class Message extends \common\models\Message
{


    /**
     * 获取未读的消息
     * @todo 暂时不处理用户分组消息
     * @param int $limit
     * @return array
     *
     */
    public static function getUnreads($limit = 10)
    {

        $query = static::find()->joinWith('messageFlag')
            ->where([Message::tableName() . '.user_type' => static::OBJ_ADMIN, Message::tableName() . '.is_deleted' => Constants::YesNo_No])
            ->andWhere(['or', ['notify_obj' => [static::SEND_ONE, static::SEND_MULTI], MessageFlag::tableName() . '.is_read' => Constants::YesNo_No, MessageFlag::tableName() . '.is_deleted' => Constants::YesNo_No],
                ['notify_obj' => static::SEND_ALL, MessageFlag::tableName() . '.id' => null]]);
        $count = $query->count(Message::tableName() . '.id');
        $data = $query->orderBy(['level' => SORT_DESC, Message::tableName() . '.created_at' => SORT_DESC])->limit($limit)->all();
        return ['count' => $count, 'data' => $data];
    }

    public function getMessageFlag()
    {
        return $this->hasOne(MessageFlag::class, ['message_id' => 'id'])->onCondition(['user_id' => yii::$app->getUser()->getId(), MessageFlag::tableName() . '.user_type' => static::OBJ_ADMIN]);
    }

}
