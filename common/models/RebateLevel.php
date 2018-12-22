<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%rebate_level}}".
 *
 * @property int $id 返佣层级ID
 * @property int $plan_id 返佣方案ID
 * @property string $profit_amount
 * @property int $bet_user_num 投注用户数
 * @property string $rebate_limit 返佣上限
 */
class RebateLevel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%rebate_level}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['plan_id'], 'required'],
            [['plan_id', 'bet_user_num'], 'integer'],
            [['profit_amount', 'rebate_limit'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '返佣层级ID',
            'plan_id' => '返佣方案ID',
            'profit_amount' => 'Profit Amount',
            'bet_user_num' => '投注用户数',
            'rebate_limit' => '返佣上限',
        ];
    }
}
