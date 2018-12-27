<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%user_login_log}}".
 *
 * @property int $id 记录编号
 * @property int $user_id 会员编号
 * @property string $username 会员名称
 * @property string $login_ip 登录IP
 * @property string $device_type 设备类型
 * @property string $client_type 登录客户端类型
 * @property string $client_version 客户端版本号
 * @property string $user_agent 浏览器信息
 * @property string $deviceid 设备ID
 * @property int $created_at 创建时间
 * @property int $updated_at 最后修改时间
 */
class UserLoginLog extends \yii\db\ActiveRecord
{

    const CLIENT_TYPE_H5 = 'H5';
    const CLIENT_TYPE_APP = 'App';
    const CLIENT_TYPE_WEB = 'Web';
    const CLIENT_TYPE_OTHER = 'Other';

    const DEVICE_TYPE_IOS = 'iOS';
    const DEVICE_TYPE_ANDROID = 'Android';
    const DEVICE_TYPE_PC = 'Pc';
    const DEVICE_TYPE_OTHER = 'Other';


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_login_log}}';
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
            [['id'], 'required'],
            [['id', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['username'], 'client_type', 'device_type', 'string', 'max' => 64],
            [['login_ip'], 'string', 'max' => 50],
            [['client_version', 'deviceid', 'user_agent'], 'string', 'max' => 255],
            [['id'], 'unique'],
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
            'username' => '会员名称',
            'login_ip' => '登录IP',
            'device_type' => '设备类型',
            'client_type' => '登录客户端',
            'client_version' => '客户端版本号',
            'user_agent' => '浏览器信息',
            'deviceid' => '设备ID',
            'created_at' => '登陆时间',
            'updated_at' => '最后修改时间',
        ];
    }

    public static function getLoginClients($key = null)
    {
        $ary = [
            static::CLIENT_TYPE_H5=> 'H5',
            static::CLIENT_TYPE_APP => 'App',
            static::CLIENT_TYPE_WEB => 'Web',
            static::CLIENT_TYPE_OTHER => '其它',
        ];
        return $ary[$key] ?? $ary;
    }

    public static function getDeviceTypes($key = null)
    {
        $ary = [
            static::DEVICE_TYPE_IOS => '苹果',
            static::DEVICE_TYPE_ANDROID => '安卓',
            static::DEVICE_TYPE_PC => 'PC',
            static::DEVICE_TYPE_OTHER => '其它',
        ];
        return $ary[$key]??$ary;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
