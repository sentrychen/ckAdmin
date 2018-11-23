<?php

namespace common\models;

use Yii;
use yii\helpers\Json;

/**
 * This is the model class for table "{{%platform_user}}".
 *
 * @property string $id 游戏平台用户ID
 * @property int $platform_id 游戏平台ID
 * @property string $user_id 用户ID
 * @property string $username 用户名称
 * @property string $game_account 游戏登陆账号
 * @property string $game_password 游戏登陆密码
 * @property string $auth_data 认证数据
 * @property int $user_status 用户状态 1 正常 2 冻结  3 锁定 4 注销
 * @property string $first_login_ip 首次登陆IP
 * @property int $last_login_at 最后登陆事件
 * @property string $last_login_ip 最后登陆IP
 * @property string $available_amount 用户余额
 * @property string $frozen_amount 冻结余额
 * @property int $updated_at 更新日期
 * @property int $created_at 创建日期
 */
class PlatformUser extends \yii\db\ActiveRecord
{
    private $_password = "mgGZbPu6GQamAhuXJlMa5kxRR3lElgAT_1542177649";

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%platform_user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['platform_id', 'user_id'], 'required'],
            [['platform_id', 'user_id', 'user_status', 'last_login_at', 'updated_at', 'created_at'], 'integer'],
            [['available_amount', 'frozen_amount'], 'number'],
            [['username', 'first_login_ip', 'last_login_ip'], 'string', 'max' => 64],
            [['game_account', 'game_password'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '游戏平台用户ID',
            'platform_id' => '游戏平台',
            'user_id' => '用户ID',
            'username' => '用户名称',
            'game_account' => '游戏登陆账号',
            'game_password' => '游戏登陆密码',
            'auth_data' => '认证数据',
            'user_status' => '用户状态',
            'first_login_ip' => '首次登陆IP',
            'last_login_at' => '最后登陆时间',
            'last_login_ip' => '最后登陆IP',
            'available_amount' => '用户余额',
            'frozen_amount' => '冻结余额',
            'updated_at' => '更新日期',
            'created_at' => '创建日期',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlatform()
    {
        return $this->hasOne(Platform::class, ['id' => 'platform_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * 加密 auth_data
     * @param $data
     * @return string
     */
    public function encodeAuthData($data)
    {
        $this->auth_data = Yii::$app->security->encryptByPassword(Json::encode($data), $this->_password);
        return $this->auth_data;
    }

    /**
     * 解密 auth_data
     */
    public function decodeAuthData()
    {
        if (!$this->auth_data) return null;
        $data = Yii::$app->security->decryptByPassword($this->auth_data, $this->_password);
        return Json::decode($data);
    }

}
