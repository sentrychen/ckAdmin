<?php

namespace common\models;

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
            [['agent_id', 'created_at', 'updated_at'], 'integer'],
            [['name', 'app_name'], 'string', 'max' => 64],
            [['app_logo', 'app_id', 'app_secret'], 'string', 'max' => 255],
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
            'created_at' => '创建日期',
            'updated_at' => '更新日期',
        ];
    }
}
