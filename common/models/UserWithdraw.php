<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%user_withdraw}}".
 *
 * @property string $id 存款单号
 * @property string $user_id 用户ID
 * @property string remark 备注
 * @property string $apply_amount 申请取款金额
 * @property int $status 取款状态 1 申请中 2 已完成  0 已取消
 * @property string $transfer_amount 实际转账金额
 * @property int $audit_by_id 处理人员ID
 * @property string $audit_by_username 处理人员
 * @property string $audit_remark 处理备注
 * @property int $audit_at 处理时间
 * @property int $user_bank_id 银行账号ID
 * @property string $bank_name 银行开户名
 * @property string $bank_account 银行账号
 * @property int $updated_at 更新日期
 * @property int $created_at 创建日期
 * @property string $apply_ip 申请时登陆IP
 */
class UserWithdraw extends \yii\db\ActiveRecord
{

    const STATUS_UNCHECKED = 1;
    const STATUS_CHECKED = 2;
    const STATUS_CANCLED = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_withdraw}}';
    }

    /**
     * @return int
     */
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
            [['user_id', 'apply_amount'], 'required'],
            [['user_id', 'status', 'audit_by_id', 'audit_at', 'user_bank_id', 'updated_at', 'created_at'], 'integer'],
            [['apply_amount', 'transfer_amount'], 'number'],
            [['remark', 'audit_remark'], 'string', 'max' => 255],
            [['audit_by_username', 'bank_name', 'bank_account', 'apply_ip'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '存款单号',
            'user_id' => '用户ID',
            'remark' => '备注',
            'apply_amount' => '申请取款金额',
            'status' => '取款状态',
            'transfer_amount' => '实际转账金额',
            'audit_by_id' => '处理人员ID',
            'audit_by_username' => '处理人员',
            'audit_remark' => '处理备注',
            'audit_at' => '处理时间',
            'user_bank_id' => '银行账号ID',
            'bank_name' => '银行开户名',
            'bank_account' => '银行账号',
            'updated_at' => '更新日期',
            'created_at' => '申请日期',
            'apply_ip' => '申请时登陆IP',
        ];
    }
    public static function getStatuses($key = null)
    {
        $status =  [
            self::STATUS_UNCHECKED => '申请中',
            self::STATUS_CHECKED => '已完成',
            self::STATUS_CANCLED => '已取消',
        ];
        return $status[$key]??$status;
    }

}
