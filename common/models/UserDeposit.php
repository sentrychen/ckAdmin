<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%user_deposit}}".
 *
 * @property string $id 存款记录ID
 * @property int $user_id 会员ID
 * @property string remark 备注信息
 * @property string $apply_amount 申请存款金额
 * @property int $status 存款状态 1 申请中 2 已存入 0 已取消
 * @property string $confirm_amount 确认金额
 * @property int $audit_by_id 处理人员ID
 * @property string $audit_by_username 处理人员
 * @property string $audit_remark 处理备注
 * @property int $audit_at 处理时间
 * @property int $pay_channel 支付渠道 1 银行转账 2 支付宝 3 微信
 * @property string $pay_username 支付账号
 * @property string $pay_nickname 支付用户昵称
 * @property string $pay_info 支付信息
 * @property int $save_bank_id 存入公司账号ID
 * @property int $feedback 会员反馈 0 无 1 成功 2 失败
 * @property string $feedback_remark 会员反馈信息
 * @property int $feedback_at 反馈时间
 * @property int $updated_at 更新日期
 * @property int $created_at 创建日期
 */
class UserDeposit extends \yii\db\ActiveRecord
{

    const STATUS_UNCHECKED = 1;
    const STATUS_CHECKED = 2;
    const STATUS_CANCLED = 0;

    const CHANNEL_BANK = 1;
    const CHANNEL_ALIPAY = 2;
    const CHANNEL_WEIXIN = 3;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_deposit}}';
    }

    public static function getUncheckedCount()
    {
        return static::find()->where(['status' => static::STATUS_UNCHECKED])->count('id');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'apply_amount', 'pay_channel'], 'required'],
            [['user_id', 'status', 'audit_by_id', 'audit_at', 'pay_channel', 'save_bank_id', 'feedback', 'feedback_at', 'updated_at', 'created_at'], 'integer'],
            [['apply_amount', 'confirm_amount'], 'number'],
            [['remark', 'audit_remark', 'pay_username', 'pay_nickname', 'pay_info', 'feedback_remark'], 'string', 'max' => 255],
            [['audit_by_username'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '存款记录ID',
            'user_id' => '会员ID',
            'remark' => '备注',
            'apply_amount' => '申请存款金额',
            'status' => '存款状态',
            'confirm_amount' => '确认金额',
            'audit_by_id' => '处理人员ID',
            'audit_by_username' => '处理人员',
            'audit_remark' => '处理备注',
            'audit_at' => '处理时间',
            'pay_channel' => '支付渠道',
            'pay_username' => '支付账号',
            'pay_nickname' => '支付用户昵称',
            'pay_info' => '支付信息',
            'save_bank_id' => '存入公司账号ID',
            'feedback' => '会员反馈',
            'feedback_remark' => '会员反馈信息',
            'feedback_at' => '反馈时间',
            'updated_at' => '更新日期',
            'created_at' => '申请日期',
        ];
    }

    public static function getStatuses($key = null)
    {
        $status =  [
            self::STATUS_UNCHECKED => '申请中',
            self::STATUS_CHECKED => '已存入',
            self::STATUS_CANCLED => '已取消',
        ];
        return $status[$key]??$status;
    }

    public static function getPayChannels($key = null)
    {
        $channels =  [
            self::CHANNEL_BANK => '银行',
            self::CHANNEL_ALIPAY => '支付宝',
            self::CHANNEL_WEIXIN => '微信支付',
        ];
        return $channels[$key]??$channels;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
