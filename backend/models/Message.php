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

        $query = static::queryUserMessages(Message::OBJ_ADMIN, Yii::$app->getUser()->getId(), Constants::YesNo_No);
        $count = $query->count(Message::tableName() . '.id');
        $data = $query->orderBy(['level' => SORT_DESC, Message::tableName() . '.created_at' => SORT_DESC])->limit($limit)->all();
        return ['count' => $count, 'data' => $data];
    }

    public function getMessageFlag()
    {
        return $this->hasOne(MessageFlag::class, ['message_id' => 'id'])->onCondition(['user_id' => yii::$app->getUser()->getId(), MessageFlag::tableName() . '.user_type' => static::OBJ_ADMIN]);
    }

}
