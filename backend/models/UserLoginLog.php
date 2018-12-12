<?php

namespace backend\models;

use Yii;

class UserLoginLog extends \common\models\UserLoginLog
{
    /*
     * 统计最近时间段 活跃用户
     * @param $startDate string 开始时间
     * @param $endDate string 结束时间
     * @return array
     */
    public static function getActiveUser($startDate, $endDate = 'now')
    {
        $startDate = strtotime(date('Y-m-d 00:00:00', strtotime($startDate)));
        $endDate = strtotime($endDate);
        $number = static::find()->select('user_id')
                ->where(['between', 'created_at', $startDate, $endDate])
                ->distinct()->count();
        return $number;
    }
}
