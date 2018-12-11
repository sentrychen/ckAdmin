<?php

namespace api\models;

use Yii;

class Agent extends \common\models\Agent
{
    public function fields()
    {
        $fields = parent::fields();
        unset($fields['auth_key'], $fields['password_hash'], $fields['password_reset_token']);
        return $fields;
    }

    public function beforeSave($insert)
    {
        if ($insert) {

            if ($this->parent_id) {
                $parent = $this->parent;
                $this->rebate_rate = $parent->rebate_rate;
                $this->xima_status = $parent->xima_status;
                $this->xima_type = $parent->xima_type;
                $this->xima_rate = $parent->xima_rate;
            } else {
                $option = yii::$app->option;

                $this->rebate_rate = $option->agent_default_rebate;
                $this->xima_status = $option->agent_xima_status;
                $this->xima_type = $option->agent_xima_type;
                $this->xima_rate = $option->agent_xima_rate;
            }

        }
        return parent::beforeSave($insert);
    }
}
