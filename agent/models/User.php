<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-03-15 21:16
 */

namespace agent\models;

use common\libs\Constants;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;


class User extends \common\models\User
{


    /**
     * @param bool $skipIfSet
     */
    public function loadDefaultValues($skipIfSet = true)
    {

        $attrs = ['min_limit', 'max_limit', 'dogfall_min_limit', 'dogfall_max_limit', 'pair_min_limit', 'pair_max_limit'];
        foreach ($attrs as $attr) {
            if ($this->{$attr} === null && isset(yii::$app->option->{'game_' . $attr})) {
                $this->{$attr} = yii::$app->option->{'game_' . $attr};
            }
        }

        $this->xima_status = Constants::YesNo_No;
        $this->xima_type = Constants::XIMA_ONE_SIDED;
        $this->xima_rate = 0;
        parent::loadDefaultValues();
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            $this->invite_agent_id = yii::$app->getUser()->getId();
        }
        return parent::beforeSave($insert);
    }
}

