<?php

namespace api\models;

use Yii;

class Withdraw extends \common\models\UserWithdraw
{
    public function fields()
    {
        $fields = parent::fields();
        unset($fields['audit_by_id'], $fields['audit_by_username'], $fields['audit_remark'], $fields['audit_at']);
        return $fields;
    }
}
