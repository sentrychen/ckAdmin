<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%xima_level}}".
 *
 * @property int $id 返佣层级ID
 * @property int $plan_id 洗码方案ID
 * @property int $level 返佣层级
 * @property string $bet_amount 有效投注额度
 * @property int $bet_user_num 投注用户数
 * @property string $xima_limit 返佣上限
 */
class XimaLevel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%xima_level}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['plan_id', 'level'], 'required'],
            [['plan_id', 'level', 'bet_user_num'], 'integer'],
            [['bet_amount', 'xima_limit'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '返佣层级ID',
            'plan_id' => '洗码方案ID',
            'level' => '返佣层级',
            'bet_amount' => '有效投注额度',
            'bet_user_num' => '投注用户数',
            'xima_limit' => '返佣上限',
        ];
    }

    public function getRates()
    {
        return $this->hasMany(PlatformXima::class, ['xima_level_id' => 'id']);
    }

    public function getRate($platform_id)
    {
        if (empty($this->rates)) return null;

        foreach ($this->rates as $rate) {
            if ($rate->platform_id = $platform_id) return $rate;
        }
        return null;
    }

}
