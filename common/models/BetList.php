<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%bet_list}}".
 *
 * @property string $id 投注流水ID
 * @property string $record_id 投注单号
 * @property string $user_id 用户ID
 * @property string $username 用户名
 * @property string $platform_username 平台用户名
 * @property int $platform_id 游戏平台ID
 * @property string $game_type 游戏类型
 * @property string $table_no 桌号
 * @property int $period_boot 靴次
 * @property int $period_round 局次
 * @property int $bet_amount 投注金额
 * @property string $game_result 开奖结果
 * @property string $bet_record 投注点
 * @property int $profit 赢输
 * @property int $amount_before 投注前余额
 * @property int $amount_after 投注后余额
 * @property string $xima 洗码值
 * @property int $state 游戏状态
 * @property int $bet_at 投注时间
 * @property int $draw_at 开奖时间
 * @property int $created_at 创建时间
 */
class BetList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%bet_list}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['record_id', 'user_id', 'platform_id', 'bet_amount', 'profit', 'amount_before', 'amount_after', 'state', 'bet_at', 'draw_at', 'created_at'], 'integer'],
            [['user_id', 'platform_id'], 'required'],
            [['xima'], 'number'],
            [['username', 'platform_username', 'game_type'], 'string', 'max' => 64],
            [['table_no', 'period_boot', 'period_round'], 'string', 'max' => 32],
            [['game_result'], 'string', 'max' => 128],
            [['bet_record'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '投注流水ID',
            'record_id' => '投注单号',
            'user_id' => '用户ID',
            'username' => '用户名',
            'platform_username' => '平台用户名',
            'platform_id' => '游戏平台ID',
            'game_type' => '游戏类型',
            'table_no' => '桌号',
            'period_boot' => '靴次',
            'period_round' => '局次',
            'bet_amount' => '投注金额',
            'game_result' => '开奖结果',
            'bet_record' => '投注点',
            'profit' => '赢输',
            'amount_before' => '投注前余额',
            'amount_after' => '投注后余额',
            'xima' => '洗码值',
            'state' => '游戏状态',
            'bet_at' => '投注时间',
            'draw_at' => '开奖时间',
            'created_at' => '创建时间',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
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
        return $this->hasOne(GameType::class, ['name_en' => 'game_type']);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        if ($insert) {
            $account = new UserAccount();
            $account->user_id = $this->id;
            $account->save(false);
            $stat = new UserStat();
            $stat->user_id = $this->id;
            $stat->save(false);

            Daily::addCounter(['dnu' => 1]);
        }
    }
}
