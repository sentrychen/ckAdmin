<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "user_stat".
 *
 * @property int $user_id 会员编号
 * @property string $available_amount 可用余额
 * @property string $frozen_amount 冻结金额
 * @property int $last_login_at 最后登录时间
 * @property int $last_logout_at 最后登出时间
 * @property int $login_number 登录次数
 * @property int $log_id 登录日志ID
 * @property string $last_login_ip 最后登录IP
 * @property int $online_duration 在线时长
 * @property int $deposit_number
 * @property string $deposit_amount
 * @property int $withdrawal_number 取款次数
 * @property string $withdrawal_amount 取款总额
 * @property int $bet_number 投注次数
 * @property string $bet_amount 投注总额
 */
class UserStat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_stat}}';
    }

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
            [['user_id'], 'required'],
            [['user_id', 'last_login_at', 'last_logout_at', 'log_id', 'login_number', 'online_duration', 'deposit_number', 'withdrawal_number', 'bet_number'], 'integer'],
            [['available_amount', 'frozen_amount', 'deposit_amount', 'withdrawal_amount', 'bet_amount'], 'number'],
            [['last_login_ip'], 'string', 'max' => 64],
            [['user_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        $chart = Yii::$app->params['moneyChart'] ?? '¥';
        return [
            'user_id' => '会员编号',
            'available_amount' => '可用余额(' . $chart . ')',
            'frozen_amount' => '冻结金额(' . $chart . ')',
            'last_login_at' => '最后登录时间',
            'last_logout_at' => '最后登出时间',
            'login_number' => '登录次数',
            'log_id' => '登录日志ID',
            'last_login_ip' => '登录IP',
            'online_duration' => '累计在线时长',
            'deposit_number' => '存款次数',
            'deposit_amount' => '存款总额(' . $chart . ')',
            'withdrawal_number' => '取款次数',
            'withdrawal_amount' => '取款总额(' . $chart . ')',
            'bet_number' => '投注次数',
            'bet_amount' => '投注总额(' . $chart . ')',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLog()
    {
        return $this->hasOne(UserLoginLog::class, ['id' => 'log_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
