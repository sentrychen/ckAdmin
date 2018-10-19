<?php

namespace agent\models;

use Yii;

/**
 * This is the model class for table "game_record".
 *
 * @property int $record_id 投注号
 * @property string $after_amount 投注后余额
 * @property string $bank_card 银行卡
 * @property string $before_amount 投注前余额
 * @property string $bet_coin 投注点
 * @property string $bet_result 投注结果
 * @property int $bet_type 投注类型
 * @property bool $free_commission
 * @property int $game_play_id 游戏ID
 * @property string $game_play_name 游戏名称
 * @property int $game_score 游戏成绩
 * @property int $game_time 游戏时间
 * @property string $login_ip 登陆IP
 * @property int $number_id
 * @property string $play_card
 * @property int $room_id 房间号
 * @property string $score 获利
 * @property int $user_id 用户ID
 * @property string $user_name 用户名
 * @property int $win 赢
 */
class GameRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'game_record';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['record_id'], 'required'],
            [['record_id', 'bet_type', 'game_play_id', 'game_score', 'game_time', 'number_id', 'room_id', 'user_id', 'win'], 'integer'],
            [['after_amount', 'before_amount', 'bet_coin', 'bet_result'], 'number'],
            [['free_commission'], 'boolean'],
            [['bank_card', 'game_play_name', 'login_ip', 'play_card', 'score', 'user_name'], 'string', 'max' => 255],
            [['record_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'record_id' => '投注号',
            'after_amount' => '投注后余额',
            'bank_card' => '银行卡',
            'before_amount' => '投注前余额',
            'bet_coin' => '投注点',
            'bet_result' => '投注结果',
            'bet_type' => '投注类型',
            'free_commission' => 'Free Commission',
            'game_play_id' => '游戏ID',
            'game_play_name' => '游戏名称',
            'game_score' => '游戏成绩',
            'game_time' => '游戏时间',
            'login_ip' => '登陆IP',
            'number_id' => 'Number ID',
            'play_card' => 'Play Card',
            'room_id' => '房间号',
            'score' => '获利',
            'user_id' => '用户ID',
            'user_name' => '用户名',
            'win' => '赢',
        ];
    }
}
