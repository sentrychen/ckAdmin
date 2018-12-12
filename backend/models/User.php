<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-03-15 21:16
 */

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;



class User extends \common\models\User
{

    public function loadDefaultValues($skipIfSet = true)
    {

        $attrs = ['min_limit', 'max_limit', 'dogfall_min_limit', 'dogfall_max_limit', 'pair_min_limit', 'pair_max_limit'];
        foreach ($attrs as $attr) {
            if ($this->{$attr} === null && isset(yii::$app->option->{'game_' . $attr})) {
                $this->{$attr} = yii::$app->option->{'game_' . $attr};
            }
        }

        $this->xima_status = yii::$app->option->agent_xima_status;
        $this->xima_type =  yii::$app->option->agent_xima_type;
        $this->xima_rate = yii::$app->option->agent_xima_rate;

        parent::loadDefaultValues();
    }

    /*
     * 统计最近时间段用户 新增用户
     * @param $startDate string 开始时间
     * @param $endDate string 结束时间
     * @return array
     */
    public static function getUserCount($startDate, $endDate = 'now')
    {
        $startDate = strtotime(date('Y-m-d 00:00:00', strtotime($startDate)));
        $endDate = strtotime($endDate);
        $number = static::find()->select('id')
            ->where(['status'=>static::STATUS_NORMAL])
            ->andWhere(['between', 'created_at', $startDate, $endDate])
            ->distinct()->count();
        return $number;
    }
}

