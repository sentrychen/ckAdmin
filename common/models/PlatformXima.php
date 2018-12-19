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
            [['platform_id', 'xima_level_id', 'xima_rate'], 'required'],
            [['platform_id', 'xima_level_id', 'xima_type'], 'integer'],
            [['xima_rate'], 'number'],
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
            'xima_type' => '洗码类型 1单边 2 双边',
        ];
    }
}
