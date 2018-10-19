<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%user_account}}".
 *
 * @property int $user_id 会员编号
 * @property string $username 会员账号
 * @property string $available_amount 可用余额
 * @property string $frozen_amount 冻结金额
 * @property int $user_point 会员积分
 * @property string $xima_account 洗码值
 * @property string $xima_rate 洗码比
 * @property int $updated_at 更新日期
 * @property int $created_at 创建日期
 */
class UserAccount extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_account}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'user_point', 'updated_at', 'created_at'], 'integer'],
            [['available_amount', 'frozen_amount', 'xima_account', 'xima_rate'], 'number'],
            [['username'], 'string', 'max' => 64],
            [['user_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => '会员编号',
            'username' => '会员账号',
            'available_amount' => '可用余额',
            'frozen_amount' => '冻结金额',
            'user_point' => '会员积分',
            'xima_account' => '洗码值',
            'xima_rate' => '洗码比',
            'updated_at' => '更新日期',
            'created_at' => '创建日期',
        ];
    }
}
