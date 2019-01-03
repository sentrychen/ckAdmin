<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%platform_xima}}".
 *
 * @property int $id 自增ID
 * @property int $platform_id 游戏平台ID
 * @property int $xima_level_id 返佣级别ID
 * @property string $xima_rate 洗码率
 * @property int $xima_type 洗码类型 1单边 2 双边
 */
class PlatformXima extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%platform_xima}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['platform_id', 'xima_level_id', 'xima_rate', 'xima_type'], 'required'],
            [['platform_id', 'xima_level_id', 'xima_type'], 'integer'],
            [['xima_rate'], 'number'],
            [['xima_rate'], 'filter', 'filter' => function ($value) {
                return $value / 100;
            }],
            ['xima_rate', 'checkRate'],

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
            'xima_level_id' => '返佣级别ID',
            'xima_rate' => '洗码率',
            'xima_type' => '洗码类型',
        ];
    }

    /**
     * @return XimaLevel|\yii\db\ActiveQuery
     */
    public function getLevel()
    {
        return $this->hasOne(XimaLevel::class, ['id' => 'xima_level_id']);
    }

    public function checkRate($attribute, $params)
    {
        $agent_id = 0;
        if ($this->level && $this->level->plan) {
            $agent_id = $this->level->plan->agent_id;
        }
        if ($agent_id == 0) return true;

        $agent = Agent::findOne($agent_id);

        if (!$agent->ximaPlan) {
            $this->addError($attribute, '当前代理没有设置洗码方案');
        } else {
            $ids = [];
            foreach ($agent->ximaPlan->levels as $level) {
                $ids[] = $level->id;
            }

            $rate = static::find()->where(['xima_level_id' => $ids, 'platform_id' => $this->platform_id])->max('xima_rate');

            if ($this->xima_rate > $rate) {
                $this->addError($attribute, '洗码率超过当前代理的最大洗码率');
            }
        }
    }
}
