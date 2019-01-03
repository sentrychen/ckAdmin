<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%agent_account}}".
 *
 * @property int $agent_id 代理ID
 * @property string $agent_name 代理账号
 * @property string $available_amount 可用余额
 * @property string $frozen_amount 冻结金额
 * @property string $total_amount 累计金额
 * @property string $total_xima_amount 累计洗码金额
 * @property string $total_rebate_amount 累计返佣收入（减去洗码收入）
 * @property string $xima_amount 洗码金额
 * @property int $updated_at 更新日期
 * @property int $created_at 创建日期
 */
class AgentAccount extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%agent_account}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['agent_id'], 'required'],
            [['agent_id', 'updated_at', 'created_at'], 'integer'],
            [['available_amount', 'frozen_amount', 'xima_amount', 'total_xima_amount', 'total_rebate_amount', 'total_amount'], 'number'],
            [['agent_name'], 'string', 'max' => 64],
            [['agent_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        $chart = Yii::$app->params['moneyChart'] ?? '¥';
        return [
            'agent_id' => '代理ID',
            'agent_name' => '代理账号',
            'available_amount' => '可用余额(' . $chart . ')',
            'total_amount' => '累计收入(' . $chart . ')',
            'frozen_amount' => '冻结金额(' . $chart . ')',
            'xima_amount' => '洗码值(' . $chart . ')',
            'total_xima_amount' => '累计洗码值(' . $chart . ')',
            'total_rebate_amount' => '累计返佣(' . $chart . ')',
            'bet_amount' => '累计投注(' . $chart . ')',
            'updated_at' => '更新日期',
            'created_at' => '创建日期',
        ];
    }

    /**
     * @return Agent|\yii\db\ActiveQuery
     */
    public function getAgent()
    {
        return $this->hasOne(Agent::class, ['id' => 'agent_id']);
    }
}
