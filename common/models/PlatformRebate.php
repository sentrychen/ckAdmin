<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%platform_rebate}}".
 *
 * @property int $id 自增ID
 * @property int $platform_id 游戏平台ID
 * @property int $rebate_level_id 返佣级别ID
 * @property string $rebate_rate 返佣率
 */
class PlatformRebate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%platform_rebate}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['platform_id', 'rebate_level_id', 'rebate_rate'], 'required'],
            [['platform_id', 'rebate_level_id'], 'integer'],
            [['rebate_rate'], 'number'],
            [['rebate_rate'], 'filter', 'filter' => function ($value) {
                return $value / 100;
            }],
            [['rebate_rate'], 'checkRate'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '自增ID',
            'platform_id' => '游戏平台ID',
            'rebate_level_id' => '返佣级别ID',
            'rebate_rate' => '返佣率',
        ];
    }

    /**
     * @return RebateLevel|\yii\db\ActiveQuery
     */
    public function getLevel()
    {
        return $this->hasOne(RebateLevel::class, ['id' => 'rebate_level_id']);
    }

    public function checkRate($attribute, $params)
    {
        $agent_id = 0;
        if ($this->level && $this->level->plan) {
            $agent_id = $this->level->plan->agent_id;
        }
        if ($agent_id == 0) return true;

        $agent = Agent::findOne($agent_id);

        if (!$agent->rebatePlan) {
            $this->addError($attribute, '当前代理没有设置返佣方案');
        } else {
            $ids = [];
            foreach ($agent->rebatePlan->levels as $level) {
                $ids[] = $level->id;
            }

            $rate = static::find()->where(['rebate_level_id' => $ids, 'platform_id' => $this->platform_id])->max('rebate_rate');

            if ($this->rebate_rate > $rate) {
                $this->addError($attribute, '返佣率超过当前代理的最大返佣率');
            }
        }
    }

}
