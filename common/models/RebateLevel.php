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
            ['profit_amount', 'unique', 'targetAttribute' => ['bet_user_num', 'bet_user_num', 'plan_id'], 'message' => '层级条件不能相同'],
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

    /**
     * @return RebatePlan|\yii\db\ActiveQuery
     */
    public function getPlan()
    {
        return $this->hasOne(RebatePlan::class, ['id' => 'plan_id']);
    }

    public function getRates()
    {
        return $this->hasMany(PlatformRebate::class, ['rebate_level_id' => 'id'])->orderBy(['platform_id' => SORT_ASC]);
    }

    public function getRate($platform_id)
    {
        if ($this->id) {
            $rate = PlatformRebate::findOne(['platform_id' => $platform_id, 'rebate_level_id' => $this->id]);
            if ($rate) return $rate;
            return new PlatformRebate(['platform_id' => $platform_id, 'rebate_level_id' => $this->id]);
        }

        return new PlatformRebate(['platform_id' => $platform_id]);
    }

}
