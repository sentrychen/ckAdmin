<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%company_bank}}".
 *
 * @property int $id 银行账号ID
 * @property string $bank_username 开户姓名
 * @property string $bank_account 银行账号
 * @property string $bank_name 银行名称
 * @property string $province 开户省份
 * @property string $city 开户城市
 * @property string $branch_name 网点名称
 * @property int $card_type 银行卡类型 1:借记卡  2：信用卡
 * @property int $status 账号状态 1：启用 0：停用
 * @property int $created_by_id 创建者ID
 * @property string $created_by_ip 创建者IP
 * @property int $created_at 创建日期
 * @property int $updated_at 修改日期
 */
class CompanyBank extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%company_bank}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'bank_username', 'bank_account', 'bank_name'], 'required'],
            [['id', 'card_type', 'status', 'created_by_id', 'created_at', 'updated_at'], 'integer'],
            [['bank_username', 'bank_account', 'bank_name', 'created_by_ip'], 'string', 'max' => 64],
            [['province', 'city'], 'string', 'max' => 32],
            [['branch_name'], 'string', 'max' => 128],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '银行账号ID',
            'bank_username' => '开户姓名',
            'bank_account' => '银行账号',
            'bank_name' => '银行名称',
            'province' => '开户省份',
            'city' => '开户城市',
            'branch_name' => '网点名称',
            'card_type' => '银行卡类型 1:借记卡  2：信用卡',
            'status' => '账号状态 1：启用 0：停用',
            'created_by_id' => '创建者ID',
            'created_by_ip' => '创建者IP',
            'created_at' => '创建日期',
            'updated_at' => '修改日期',
        ];
    }
}
