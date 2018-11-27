<?php

namespace api\models;

use Yii;

class UserDeposit extends \common\models\UserDeposit
{
    public function rules()
    {
        return [
            [['user_id', 'apply_amount', 'pay_channel','pay_username'], 'required'],
            [['user_id', 'status', 'audit_by_id', 'audit_at', 'pay_channel', 'save_bank_id', 'feedback', 'feedback_at', 'updated_at', 'created_at'], 'integer'],
            [['apply_amount', 'confirm_amount'], 'number', 'min' => 0],
            [['remark', 'audit_remark', 'pay_username', 'pay_nickname', 'pay_info', 'feedback_remark'], 'string', 'max' => 255],
            [['audit_by_username'], 'string', 'max' => 64],
        ];
    }


}
