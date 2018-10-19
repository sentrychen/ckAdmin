<?php

namespace agent\models;

use Yii;

/**
 * This is the model class for table "rebate".
 *
 * @property int $id 序号
 * @property string $ym 期数
 * @property int $agent_id 代理ID
 * @property string $agent_name 代理账号
 * @property int $agent_level 代理层级
 * @property string $self_bet_amount 自身有效投注
 * @property string $sub_bet_amount 下级有效投注
 * @property string $self_profit_loss
 * @property string $sub_profit_loss
 * @property string $total_sub_amount 累计佣金
 * @property string $cur_sub_amount 当期佣金
 * @property string $cur_rebate_amount 本期返佣
 * @property string $total_rebate_amount 累计返佣
 */
class Rebate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rebate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['agent_id', 'agent_level'], 'integer'],
            [['self_bet_amount', 'sub_bet_amount', 'self_profit_loss', 'sub_profit_loss', 'total_sub_amount', 'cur_sub_amount', 'cur_rebate_amount', 'total_rebate_amount'], 'number'],
            [['ym'], 'string', 'max' => 7],
            [['agent_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '序号',
            'ym' => '期数',
            'agent_id' => '代理ID',
            'agent_name' => '代理账号',
            'agent_level' => '代理层级',
            'self_bet_amount' => '自身有效投注',
            'sub_bet_amount' => '下级有效投注',
            'self_profit_loss' => '自身损益',
            'sub_profit_loss' => '下级损益',
            'total_sub_amount' => '累计佣金',
            'cur_sub_amount' => '当期佣金',
            'cur_rebate_amount' => '本期返佣',
            'total_rebate_amount' => '累计返佣',
        ];
    }
}
