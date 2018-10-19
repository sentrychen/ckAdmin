<?php

namespace common\models;

use Yii;

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

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%message}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['is_canceled', 'canceled_at', 'is_deleted', 'deleted_at', 'level', 'user_type', 'notify_obj', 'user_group', 'sender_id', 'updated_at', 'created_at'], 'integer'],
            [['title'], 'string', 'max' => 255],
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
            'is_canceled' => '是否取消 1取消 0 否',
            'canceled_at' => '取消时间',
            'is_deleted' => '是否删除 1 删除 0 否',
            'deleted_at' => '删除时间',
            'level' => '优先级 1 普通 2 高 3 紧急',
            'user_type' => '用户类型 1 会员 2 代理 3 管理员',
            'notify_obj' => '通告对象类型 1单个用户 2 多个用户 3 全部用户 4用户类型',
            'user_group' => '用户组',
            'sender_id' => '发送者ID 0为系统发送',
            'sender_name' => '发送者名称',
            'updated_at' => '更新日期',
            'created_at' => '创建日期',
        ];
    }


}
