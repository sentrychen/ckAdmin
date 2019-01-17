<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%agent_account_record}}".
 *
 * @property int $id 代理账户变更记录ID
 * @property int $agent_id 代理ID
 * @property string $name 变更名称
 * @property string $trade_no 交易ID
 * @property string $trade_type_id 交易类型ID
 * @property string $amount 变更额度
 * @property int $switch 收支 1 收入 2支出
 * @property string $after_amount 变更后余额
 * @property string $remark 备注
 * @property int $updated_at 更新日期
 * @property int $created_at 创建日期
 */
class AgentAccountRecord extends \yii\db\ActiveRecord
{

    const SWITCH_IN = 1;
    const SWITCH_OUT = 2;

    const TRADE_TYPE_REBATE = 1;
    const TRADE_TYPE_XIMA = 2;
    const TRADE_TYPE_WITHDRAW = 3;
    const TRADE_TYPE_ADDAMOUNT = 4;
    const TRADE_TYPE_REDUCEAMOUNT = 5;
    const TRADE_TYPE_ADMINADD = 6;
    const TRADE_TYPE_ADMINREDUCE = 7;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%agent_account_record}}';
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
            [['agent_id'], 'required'],
            [['agent_id', 'switch', 'updated_at', 'created_at'], 'integer'],
            [['amount', 'after_amount'], 'number', 'min' => 0],
            [['name', 'remark'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        $chart = yii::$app->params['moneyChart'] ?? '¥';
        return [
            'id' => '交易ID',
            'agent_id' => '代理ID',
            'name' => '交易项目',
            'amount' => '交易额度(' . $chart . ')',
            'switch' => '收支',
            'trade_no' => '交易编号',
            'trade_type_id' => '交易类型ID',
            'after_amount' => '交易后余额(' . $chart . ')',
            'remark' => '备注',
            'updated_at' => '更新日期',
            'created_at' => '交易日期',
        ];
    }

    public static function getSwitchStatus($key = null)
    {
        $ary = [
            static::SWITCH_IN => '收入',
            static::SWITCH_OUT => '支出',
        ];
        return $ary[$key] ?? $ary;
    }

    public static function getTradeTypes($key = null)
    {
        $ary = [
            static::TRADE_TYPE_REBATE => '返佣',
            static::TRADE_TYPE_XIMA => '洗码',
            static::TRADE_TYPE_WITHDRAW => '取款',
            static::TRADE_TYPE_ADDAMOUNT => '用户上分',
            static::TRADE_TYPE_REDUCEAMOUNT => '用户下分',
            static::TRADE_TYPE_ADMINADD => '人工增加',
            static::TRADE_TYPE_ADMINREDUCE => '人工减少',
        ];
        return $ary[$key] ?? $ary;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgent()
    {
        return $this->hasOne(Agent::class, ['id' => 'agent_id']);
    }
}
