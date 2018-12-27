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

        if ($default_plan = XimaPlan::getDefaultPlan(XimaPlan::TYPE_USER)) {
            $this->xima_plan_id = $default_plan->id;
        }
        parent::loadDefaultValues();
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            $this->invite_agent_id = yii::$app->getUser()->getId();
            $this->ip = Yii::$app->request->getUserIP();
            $this->deviceid = Yii::$app->getUser()->getId();
            $this->origin = 'agent';
        }
        return parent::beforeSave($insert);
    }
}