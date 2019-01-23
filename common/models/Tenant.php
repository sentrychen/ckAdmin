<?php

namespace common\models;

use common\helpers\Util;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%tenant}}".
 *
 * @property int $id 租户ID
 * @property string $name 租户名称
 * @property string $app_name 应用名称
 * @property string $app_logo 应用图标
 * @property int $agent_id 租户所属代理
 * @property string $app_id 应用ID
 * @property string $app_secret 应用秘钥
 * @property string $android_current_version 当前安卓版本
 * @property string $android_require_version 安卓最低要求版本
 * @property string $android_download_url 安卓下载链接
 * @property string $ios_current_version ios当前版本
 * @property string $ios_require_version ios最低要求版本
 * @property string $ios_download_url  ios下载链接
 * @property int $open_register 是否开放注册 0 否，1是
 * @property int $created_at 创建日期
 * @property int $updated_at 更新日期
 */
class Tenant extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tenant}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['agent_id', 'open_register', 'created_at', 'updated_at'], 'integer'],
            [['agent_id'], 'unique', 'message' => '该代理已经被其它租户绑定了'],
            [['name', 'app_name', 'android_current_version', 'android_require_version', 'ios_require_version', 'ios_current_version'], 'string', 'max' => 64],
            [['app_logo', 'app_id', 'app_secret', 'android_download_url', 'ios_download_url'], 'string', 'max' => 255],
            [['android_download_url'], 'url'],
            [['ios_download_url'], 'match', 'pattern' => '/^itms-services:\/\/\?action=download-manifest&url=https:\/\/.+\.plist$/', 'message' => '请输入itms-services开头的URL'],
        ];
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
     * @return Agent|\yii\db\ActiveQuery
     */
    public function getAgent()
    {
        return $this->hasOne(Agent::class, ['id' => 'agent_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '租户ID',
            'name' => '租户名称',
            'app_name' => '应用名称',
            'app_logo' => '应用图标',
            'agent_id' => '租户所属代理',
            'app_id' => '应用ID',
            'app_secret' => '应用秘钥',
            'android_current_version' => '安卓当前版本',
            'android_require_version' => '安卓最低要求版本',
            'android_download_url' => '安卓下载链接',
            'ios_current_version' => 'iOS当前版本',
            'ios_require_version' => 'iOS最低要求版本',
            'ios_download_url' => 'iOS下载链接',
            'open_register' => '是否开放注册',
            'created_at' => '创建日期',
            'updated_at' => '更新日期',
        ];
    }

    public function beforeSave($insert)
    {
        Util::handleModelSingleFileUpload($this, 'app_logo', $insert, '@uploads/tenants/');
        if ($insert) {
            if (!$this->agent) $this->agent_id = 0;
            elseif ($this->agent->parent_id != 0) {
                return false;
            }
            $this->app_id = md5(Yii::$app->security->generateRandomKey(32));
            $this->app_secret = Yii::$app->security->generateRandomString(32);
        }
        return parent::beforeSave($insert);

    }

}
