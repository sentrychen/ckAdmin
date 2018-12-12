<?php

namespace backend\models;

use Yii;

class UserDeposit extends \common\models\UserDeposit
{
    /*
     * 统计最近时间段首存用户、首存额度、存款用户和存款额度
     * @param $startDate string 开始时间
     * @param $endDate string 结束时间
     * @return array
     */
    public static function getUserDeposit($startDate, $endDate = 'now')
    {
        $startDate = strtotime(date('Y-m-d 00:00:00', strtotime($startDate)));
        $endDate = strtotime($endDate);
        $subQuery  = static::find()->select('min(audit_at)')
                     ->where(['status'=>static::STATUS_CHECKED])->andWhere(['between', 'audit_at', $startDate, $endDate])
                     ->groupBy('user_id');
        $query = static::find()
                 ->select(['COUNT(user_id) as user','SUM(confirm_amount) as amount'])
                 ->where(['audit_at' => $subQuery])
                 ->asArray()->one();
        $query_all = static::find()->select('SUM(confirm_amount) as all_amount')
                    ->where(['status'=>static::STATUS_CHECKED])->andWhere(['between', 'audit_at', $startDate, $endDate])
                    ->asArray()->one();
        $data = array_merge($query,$query_all);

        return $data;
    }


}
