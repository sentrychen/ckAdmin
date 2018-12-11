<?php

namespace agent\models;

use Yii;

class BetList extends \common\models\BetList
{
    /*
   *  后台代理首页“投注输赢”统计图数据
   * @param int $agent_id 代理id
   * @param int $platform_id 平台id
   * @param string $startDate  开始时间
   * @param string $endDate  截止时间
   * @return array
   */
    public static function getBetListData($agent_id,$platform_id,$startDate='',$endDate='')
    {
        $startDate = strtotime(date('Y-m-d 00:00:00',strtotime($startDate)));
        $endDate = strtotime(date('Y-m-d 23:59:59',strtotime($endDate)));
        $result = static::find()
            ->select(['sum(profit) as profit'])
            ->joinWith('user')
            ->where(['invite_agent_id'=>$agent_id,'platform_id'=>$platform_id])
            ->andFilterWhere(['between', 'bet_at', $startDate, $endDate])
            ->groupBy('platform_id')
            ->one();

        return $result;
    }
}
