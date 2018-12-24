<?php

namespace common\models;

use Yii;

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
}
