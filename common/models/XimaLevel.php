<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%xima_level}}".
 *
 * @property int $id 返佣层级ID
 * @property int $plan_id 洗码方案ID
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
            [['plan_id'], 'required'],
            [['plan_id', 'bet_user_num'], 'integer'],
            [['bet_amount', 'xima_limit'], 'number', 'min' => 0],
            ['bet_amount', 'unique', 'targetAttribute' => ['bet_amount', 'plan_id'], 'message' => '层级条件不能相同']
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
            'bet_amount' => '有效投注额度',
            'bet_user_num' => '投注用户数',
            'xima_limit' => '返佣上限',
        ];
    }

    /**
     * @return XimaPlan|\yii\db\ActiveQuery
     */
    public function getPlan()
    {
        return $this->hasOne(XimaPlan::class, ['id' => 'plan_id']);
    }

    public function getRates()
    {
        return $this->hasMany(PlatformXima::class, ['xima_level_id' => 'id'])->orderBy(['platform_id' => SORT_ASC]);
    }

    public function getRate($platform_id)
    {
        if ($this->id) {
            $rate = PlatformXima::findOne(['platform_id' => $platform_id, 'xima_level_id' => $this->id]);
            if ($rate) return $rate;
            return new PlatformXima(['platform_id' => $platform_id, 'xima_level_id' => $this->id]);
        }

        return new PlatformXima(['platform_id' => $platform_id]);
    }

}
