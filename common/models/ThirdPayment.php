<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "{{%third_payment}}".
 *
 * @property int $id 自增id
 * @property string $name 名称
 * @property string $code 英文代码
 * @property string $deposit_min 单笔存款下限
 * @property string $deposit_max 单笔存款上限
 * @property string $withdraw_min 单笔取款上限
 * @property string $withdraw_max 单笔存款上限
 * @property double $sort 排序
 * @property int $status 账号状态 0：停用 1：启用  2：删除
 * @property int $created_at 创建时间
 * @property int $updated_at 最后修改时间
 */
class ThirdPayment extends \yii\db\ActiveRecord
{
    const STATUS_DISABLED = 0;
    const STATUS_ENABLED = 1;
    const STATUS_DELETE = 2;
    const SAVE_PAYMENT_ID = 4;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%third_payment}}';
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
            [['name'], 'required'],
            [['deposit_min', 'deposit_max', 'withdraw_min', 'withdraw_max', 'sort'], 'number'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '自增id',
            'name' => '名称',
            'code' => '英文代码',
            'deposit_min' => '单笔存款下限',
            'deposit_max' => '单笔存款上限',
            'withdraw_min' => '单笔取款上限',
            'withdraw_max' => '单笔存款上限',
            'sort' => '排序',
            'status' => '账号状态',
            'created_at' => '创建时间',
            'updated_at' => '最后修改时间',
        ];
    }

    public static function getStatuses($key = null)
    {
        $status = [
            self::STATUS_ENABLED => '启用',
            self::STATUS_DISABLED => '停用',
            self::STATUS_DELETE => '删除',
        ];
        return $status[$key] ?? $status;
    }
}
