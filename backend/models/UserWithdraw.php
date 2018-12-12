<?php

namespace backend\models;

use Yii;

class UserWithdraw extends \common\models\UserWithdraw
{
    /*
     * 统计最近时间段用户 取款
     * @param $startDate string 开始时间
     * @param $endDate string 结束时间
     * @return array
     */
    public static function getUserWithdraw($startDate, $endDate = 'now')
    {
        $startDate = strtotime(date('Y-m-d 00:00:00', strtotime($startDate)));
        $endDate = strtotime($endDate);
        $data = [
            'user' => 0,
            'amount' => 0
        ];
        $number = static::find()->select('user_id')
            ->where(['status'=>static::STATUS_CHECKED])
            ->andWhere(['between', 'created_at', $startDate, $endDate])
            ->distinct()->count();
        $data['user'] = $number?$number:0;
        $amount = static::find()
            ->where(['status'=>static::STATUS_CHECKED])
            ->andWhere(['between', 'created_at', $startDate, $endDate])
            ->sum('transfer_amount');
        $data['amount'] = $amount?$amount:0;
        return $data;
    }
}
