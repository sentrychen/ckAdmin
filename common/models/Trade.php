<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trade}}".
 *
 * @property string $id 会员账户变更日志表
 * @property string $user_id 会员ID
 * @property string $username 会员名称
 * @property int $income_switch 收支类型 1收入 2支出
 * @property string $trade_no 交易单号
 * @property int $trade_type_id 交易类型ID
 * @property string $remark 备注信息
 * @property int $amount 收支金额
 * @property int $after_amount 交易后余额
 * @property int $updated_at 更新日期
 * @property int $created_at 创建日期
 */
class Trade extends \yii\db\ActiveRecord
{

    const SWITCH_IN = 1;
    const SWITCH_OUT = 2;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%trade}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'income_switch', 'amount', 'after_amount'], 'required'],
            [['user_id', 'income_switch', 'trade_type_id', 'amount', 'after_amount', 'updated_at', 'created_at'], 'integer'],
            [['username'], 'string', 'max' => 64],
            [['trade_no', 'remark'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '会员账户变更日志表',
            'user_id' => '会员ID',
            'username' => '会员名称',
            'income_switch' => '收支类型',
            'trade_no' => '交易单号',
            'trade_type_id' => '交易类型',
            'remark' => '备注信息',
            'amount' => '交易金额',
            'after_amount' => '交易后余额',
            'updated_at' => '更新日期',
            'created_at' => '交易时间',
        ];
    }

    public static function getSwitchStatus($key = null)
    {
        $ary = [
            static::SWITCH_IN=> '收入',
            static::SWITCH_OUT => '支出',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTradeType()
    {
        return $this->hasOne(TradeType::class, ['id' => 'trade_type_id']);
    }

}
