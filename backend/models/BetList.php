<?php

namespace backend\models;

use Yii;

class BetList extends \common\models\BetList
{
    /*
     * 统计最近时间段用户 投注
     * @param $startDate string 开始时间
     * @param $endDate string 结束时间
     * @return array
     */
    public static function getUserBet($startDate, $endDate = 'now')
    {
        $startDate = strtotime(date('Y-m-d 00:00:00', strtotime($startDate)));
        $endDate = strtotime($endDate);
        $data = [
            'user' => 0,
            'amount' => 0
        ];
        $number = static::find()->select('user_id')
            ->where(['between', 'bet_at', $startDate, $endDate])
            ->distinct()->count();
        $data['user'] = $number?$number:0;
        $amount = static::find()
            ->where(['between', 'bet_at', $startDate, $endDate])
            ->sum('bet_amount');
        $data['amount'] = $amount?$amount:0;
        return $data;
    }
}
