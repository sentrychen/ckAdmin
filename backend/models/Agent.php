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

class Agent extends \common\models\Agent
{

    /**
     * @param bool $skipIfSet
     */
    public function loadDefaultValues($skipIfSet = true)
    {
        parent::loadDefaultValues();
        /*
        $this->rebate_rate = yii::$app->option->agent_default_rebate;
        $this->xima_status = yii::$app->option->agent_xima_status;
        $this->xima_type = yii::$app->option->agent_xima_type;
        $this->xima_rate = yii::$app->option->agent_xima_rate;
        */
    }

}

