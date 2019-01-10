<?php

namespace common\models;

use common\helpers\Util;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%platform_game}}".
 *
 * @property int $id 平台游戏ID
 * @property int $platform_id 平台ID
 * @property string $game_name 游戏名称
 * @property string $game_name_en 游戏英文名称
 * @property string $game_icon_url 游戏图标地址
 * @property int $game_type_id 游戏类型ID
 * @property int $status 激活状态 0 禁用，1 启用
 * @property string $bet_amount 投注总额
 * @property string $profit 合计益损
 * @property int $bet_num 投注次数
 * @property int $bet_user_num 投注用户数
 * @property int $created_at 创建日期
 * @property int $updated_at 更新日期
 */
class PlatformGame extends \yii\db\ActiveRecord
{

    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%platform_game}}';
    }

    public static function getStatuses($key = null)
    {
        $status = [
            self::STATUS_ENABLED => '激活',
            self::STATUS_DISABLED => '停用',
        ];
        return $status[$key] ?? $status;
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['platform_id', 'game_name', 'game_name_en', 'game_type_id'], 'required'],
            ['game_name_en', 'unique', 'targetAttribute' => ['platform_id', 'game_name_en'], 'message' => '同一个平台下游戏英文名不能相同'],
            [['platform_id', 'game_type_id', 'status', 'bet_num', 'bet_user_num', 'created_at', 'updated_at'], 'integer'],
            [['bet_amount', 'profit'], 'number'],
            [['game_name', 'game_name_en'], 'string', 'max' => 64],
            [['game_icon_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlatform()
    {
        return $this->hasOne(Platform::class, ['id' => 'platform_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGameType()
    {
        return $this->hasOne(GameType::class, ['id' => 'game_type_id']);
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '平台游戏ID',
            'platform_id' => '平台',
            'game_name' => '游戏名称',
            'game_name_en' => '英文名称',
            'game_icon_url' => '游戏图标',
            'game_type_id' => '游戏类型',
            'status' => '状态',
            'bet_amount' => '投注总额',
            'profit' => '合计益损',
            'bet_num' => '投注次数',
            'bet_user_num' => '投注用户数',
            'created_at' => '创建日期',
            'updated_at' => '更新日期',
        ];
    }

    public function beforeSave($insert)
    {
        Util::handleModelSingleFileUpload($this, 'game_icon_url', $insert, '@uploads/games/');
        return parent::beforeSave($insert);

    }
}
