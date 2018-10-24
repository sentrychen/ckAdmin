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
}

