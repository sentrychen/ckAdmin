<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%user_login_platform_log}}".
 *
 * @property string $id 记录编号
 * @property int $user_id 会员编号
 * @property int $login_log_id 系统登录日志ID
 * @property int $platform_id 设备类型
 * @property int $created_at 创建时间
 * @property int $updated_at 最后修改时间
 */
class UserLoginPlatformLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_login_platform_log}}';
    }

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
            [['user_id', 'login_log_id', 'platform_id', 'created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '记录编号',
            'user_id' => '会员编号',
            'login_log_id' => '系统登录日志ID',
            'platform_id' => '设备类型',
            'created_at' => '创建时间',
            'updated_at' => '最后修改时间',
        ];
    }
}
