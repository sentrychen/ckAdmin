<?php

namespace common\models;


use Yii;

/**
 * This is the model class for table "{{%game_platform}}".
 *
 * @property int $id 平台ID
 * @property string $name 游戏平台名称
 * @property string $code 平台代码
 * @property string $api_host api地址
 * @property string $app_id 应用ID
 * @property string $app_secret ap密钥
 * @property string $login_url 登陆地址
 * @property int $status 平台状态 1 激活 0 停用
 * @property string $buy_amount 购买额度
 * @property string $total_amount 累计购买额度
 * @property string $available_amount 平台可用额度
 * @property string $frozen_amount 平台冻结额度
 * @property int $updated_at 更新日期
 * @property int $created_at 创建日期
 */
class Platform extends \yii\db\ActiveRecord
{
    const STATUS_ENABLE = 1;
    const STATUS_DISABLE = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%platform}}';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'code'], 'required'],
            [['status', 'updated_at', 'created_at'], 'integer'],
            [['buy_amount', 'total_amount', 'available_amount', 'frozen_amount'], 'number'],
            [['name'], 'string', 'max' => 64],
            [['code'], 'string', 'max' => 16],
            [['api_host', 'app_id', 'app_secret', 'login_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '平台ID',
            'name' => '游戏平台名称',
            'code' => '平台代码',
            'api_host' => 'api地址',
            'app_id' => '应用ID',
            'app_secret' => 'ap密钥',
            'login_url' => '登陆地址',
            'status' => '平台状态 1 激活 0 停用',
            'buy_amount' => '购买额度',
            'total_amount' => '累计购买额度',
            'available_amount' => '平台可用额度',
            'frozen_amount' => '平台冻结额度',
            'updated_at' => '更新日期',
            'created_at' => '创建日期',
        ];
    }
}
