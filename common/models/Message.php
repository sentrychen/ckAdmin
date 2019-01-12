<?php

namespace common\models;

use backend\models\AdminUser;
use common\libs\Constants;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%message}}".
 *
 * @property int $id 消息ID
 * @property string $title 消息标题
 * @property string $content 消息内容
 * @property int $is_canceled 是否取消 1取消 0 否
 * @property int $canceled_at 取消时间
 * @property int $is_deleted 是否删除 1 删除 0 否
 * @property int $deleted_at 删除时间
 * @property int $level 优先级 1 普通 2 高 3 紧急
 * @property int $user_type 用户类型 1 会员 2 代理 3 管理员
 * @property int $notify_obj 通告对象类型 1单个用户 2 多个用户 3 全部用户 4用户类型
 * @property int $user_group 用户组
 * @property int $sender_id 发送者ID 0为系统发送
 * @property string $sender_name 发送者名称
 * @property int $updated_at 更新日期
 * @property int $created_at 创建日期
 */
class Message extends \yii\db\ActiveRecord
{
    const OBJ_MEMBER = 1;
    const OBJ_AGENT = 2;
    const OBJ_ADMIN = 3;

    const SEND_ONE = 1;
    const SEND_MULTI = 2;
    const SEND_ALL = 3;
    const SEND_GROUP = 4;

    const LEVEL_LOW = 1;
    const LEVEL_MID = 2;
    const LEVEL_HIGH = 3;

    public $ids;
    public $is_read;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%message}}';
    }


    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content', 'level', 'user_type'], 'required'],
            [['is_deleted', 'deleted_at', 'level', 'user_type', 'notify_obj', 'user_group', 'sender_id', 'updated_at', 'created_at'], 'integer'],
            [['title', 'ids'], 'string', 'max' => 255],
            [['content'], 'string', 'max' => 512],
            [['sender_name'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '消息ID',
            'title' => '消息标题',
            'content' => '消息内容',
            'is_deleted' => '是否删除',
            'deleted_at' => '删除时间',
            'level' => '优先级',
            'user_type' => '用户类型',
            'notify_obj' => '通告对象',
            'user_group' => '用户组',
            'sender_id' => '发送者ID',
            'sender_name' => '发送者名称',
            'updated_at' => '更新日期',
            'created_at' => '发送时间',
        ];
    }

    public function beforeSave($insert)
    {

        return parent::beforeSave($insert);
    }

    /**
     * @param null $key
     * @return array|mixed
     */
    public static function getUserTypes($key = null)
    {
        $items = [
            self::OBJ_MEMBER => '会员',
            self::OBJ_AGENT => '代理',
            self::OBJ_ADMIN => '管理员',
        ];
        return $items[$key] ?? $items;
    }

    /**
     * @param null $key
     * @return array|mixed
     */
    public static function getNotifyObjs($key = null)
    {
        $items = [
            self::SEND_ONE => '单用户',
            self::SEND_MULTI => '多用户',
            self::SEND_ALL => '全体',
            self::SEND_GROUP => '群组',
        ];
        return $items[$key] ?? $items;
    }

    /**
     * @param null $key
     * @return array|mixed
     */
    public static function getLevels($key = null)
    {
        $items = [
            self::LEVEL_LOW => '普通',
            self::LEVEL_MID => '重要',
            self::LEVEL_HIGH => '紧急',
        ];
        return $items[$key] ?? $items;
    }

    /**
     * @return array|\yii\db\ActiveRecord
     */
    public function getUserNames()
    {
        if (!$this->ids) return [];
        if ($this->user_type == self::OBJ_MEMBER) {
            $query = User::find();
        } elseif ($this->user_type == self::OBJ_AGENT) {
            $query = Agent::find();
        } elseif ($this->user_type == self::OBJ_ADMIN) {
            $query = AdminUser::find();
        } else {
            return [];
        }
        return $query->select('username')->where(['id' => explode(',', $this->ids)])->asArray()->column();
    }

    /**
     * @param null $key
     * @return array|mixed
     */
    public static function getStatus($key = null)
    {
        $items = [
            1 => '已删除',
        ];
        return $items[$key] ?? $items;
    }

    public static function sendSysMessageToUser($uids, $title, $content, $level = self::LEVEL_LOW)
    {
        return self::sendSysMessage($uids, $title, $content, self::OBJ_MEMBER, $level);

    }

    public static function sendSysMessageToAdmin($uids, $title, $content, $level = self::LEVEL_LOW)
    {
        return self::sendSysMessage($uids, $title, $content, self::OBJ_ADMIN, $level);

    }

    public static function sendSysMessageToAgent($uids, $title, $content, $level = self::LEVEL_LOW)
    {

        return self::sendSysMessage($uids, $title, $content, self::OBJ_AGENT, $level);
    }

    public static function sendSysMessage($uids, $title, $content, $user_type, $level = self::LEVEL_LOW)
    {
        $message = new self([
            'ids' => implode(',', $uids),
            'title' => $title,
            'content' => $content,
            'notify_obj' => self::SEND_MULTI,
            'level' => $level,
            'user_type' => $user_type,
            'sender_id' => 0,
            'sender_name' => '系统'
        ]);

        return $message->save();
    }

    public function afterSave($insert, $changedAttributes)
    {
        if ($insert && !empty($this->ids)) {
            $ids = explode(',', $this->ids);
            foreach ($ids as $id) {
                $flag = new MessageFlag();
                $flag->user_id = $id;
                $flag->user_type = $this->user_type;
                $flag->message_id = $this->id;
                $flag->save();
            }
        }
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }


    /**
     * @return ActiveQuery
     */
    public function getMessageFlags()
    {
        return $this->hasMany(MessageFlag::class, ['message_id' => 'id']);
    }


    /**
     * 根据用户ID获得消息查询对象
     *
     * @param $user_id
     * @param $user_type
     * @param null $is_read
     * @return ActiveQuery
     */
    public static function queryUserMessages($user_type, $user_id, $is_read = null)
    {

        $no_deleted = Constants::YesNo_No;
        $on = MessageFlag::tableName() . '.message_id=' . Message::tableName() . '.id and ' . MessageFlag::tableName() . '.user_id=' . $user_id . ' and ' . MessageFlag::tableName() . '.user_type=' . $user_type;
        $query = Message::find()->select([Message::tableName() . '.*', MessageFlag::tableName() . '.is_read'])->leftJoin(MessageFlag::tableName(), $on)
            ->where([Message::tableName() . '.user_type' => $user_type]);

        if (is_null($is_read) || $is_read == '') {
            $query->andWhere(['or', [MessageFlag::tableName() . '.is_deleted' => $no_deleted],
                ['notify_obj' => Message::SEND_ALL, MessageFlag::tableName() . '.id' => null]]);
        } elseif ($is_read == Constants::YesNo_Yes) {
            $query->andWhere([MessageFlag::tableName() . '.is_deleted' => $no_deleted, 'is_read' => $is_read]);
        } else {
            $query->andWhere(['or', [MessageFlag::tableName() . '.is_deleted' => $no_deleted, 'is_read' => $is_read],
                ['notify_obj' => Message::SEND_ALL, MessageFlag::tableName() . '.id' => null]]);
        }
        return $query;
    }

    /**
     * 阅读消息，如果$id为空则阅读全部消息
     * @param $user_type
     * @param null $user_id
     * @param null $ids
     * @return array|ActiveRecord
     */
    public static function readMessage($user_type, $user_id = null, $ids = null)
    {
        if ($user_id == null) $user_id = Yii::$app->getUser()->getId();
        $models = self::queryUserMessages($user_type, $user_id)->andFilterWhere([Message::tableName() . '.id' => $ids])->all();
        foreach ($models as $model) {
            $flag = MessageFlag::findOne(['message_id' => $model->id, 'user_id' => $user_id, 'user_type' => $user_type]);
            if (!$flag) {
                $flag = new MessageFlag(['message_id' => $model->id, 'user_id' => $user_id, 'user_type' => $user_type]);
            }
            if ($flag->is_read == Constants::YesNo_No) {
                $flag->is_read = Constants::YesNo_Yes;
                $flag->read_at = time();
            }
            $flag->save(false);
        }
        return $models;
    }

    /**
     * 删除消息 如果$id为空则删除全部消息
     * @param $user_type
     * @param null $user_id
     * @param null $ids
     * @return array|ActiveRecord
     */
    public static function deleteMessage($user_type, $user_id = null, $ids = null)
    {
        if ($user_id == null) $user_id = Yii::$app->getUser()->getId();
        $models = self::queryUserMessages($user_type, $user_id)->andFilterWhere([Message::tableName() . 'id' => $ids])->all();
        foreach ($models as $model) {
            $flag = MessageFlag::findOne(['message_id' => $model->id, 'user_id' => $user_id, 'user_type' => $user_type]);
            if (!$flag) {
                $flag = new MessageFlag(['message_id' => $model->id, 'user_id' => $user_id, 'user_type' => $user_type]);
            }
            if ($flag->is_deleted == Constants::YesNo_No) {
                $flag->is_deleted = Constants::YesNo_Yes;
                $flag->deleted_at = time();
            }
            $flag->save(false);
        }
        return $models;
    }

}
