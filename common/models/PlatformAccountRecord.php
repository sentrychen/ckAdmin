<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%platform_account_record}}".
 *
 * @property int $id 游戏平台账户变更记录ID
 * @property int $platform_id 代理ID
 * @property string $name 变更名称
 * @property string $amount 变更额度
 * @property int $switch 收支 1 收入 2支出
 * @property string $after_amount 变更后余额
 * @property string $remark 备注
 * @property int $updated_at 更新日期
 * @property int $created_at 创建日期
 */
class PlatformAccountRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%platform_account_record}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['platform_id'], 'required'],
            [['platform_id', 'switch', 'updated_at', 'created_at'], 'integer'],
            [['amount', 'after_amount'], 'number'],
            [['name', 'remark'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '游戏平台账户变更记录ID',
            'platform_id' => '代理ID',
            'name' => '变更名称',
            'amount' => '变更额度',
            'switch' => '收支 1 收入 2支出',
            'after_amount' => '变更后余额',
            'remark' => '备注',
            'updated_at' => '更新日期',
            'created_at' => '创建日期',
        ];
    }
}
