<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%user_relate}}".
 *
 * @property string $id 关联ID
 * @property string $user_id 用户ID
 * @property string $relate_id 关联账号ID
 * @property string $ip 登录IP
 * @property string $deviceid 设备ID
 * @property string $user_log_id 用户日志ID
 * @property string $relate_log_id 关联用户日志ID
 * @property string $remark 备注
 * @property int $created_at 创建日期
 * @property int $updated_at 更新日期
 */
class UserRelate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_relate}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'relate_id'], 'required'],
            [['user_id', 'relate_id', 'user_log_id', 'relate_log_id', 'created_at', 'updated_at'], 'integer'],
            [['ip'], 'string', 'max' => 64],
            [['deviceid', 'remark'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '关联ID',
            'user_id' => '用户ID',
            'relate_id' => '关联账号ID',
            'ip' => '登录IP',
            'deviceid' => '设备ID',
            'user_log_id' => '用户日志ID',
            'relate_log_id' => '关联用户日志ID',
            'remark' => '关联原因',
            'created_at' => '创建日期',
            'updated_at' => '更新日期',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelateUser()
    {
        return $this->hasOne(User::class, ['id' => 'relate_id']);
    }


}
