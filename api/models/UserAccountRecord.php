<?php

namespace api\models;

use common\libs\Constants;
use Yii;


class UserAccountRecord extends \common\models\UserAccountRecord
{
    public function fields()
    {
        $fields = parent::fields();

        $fields['switch_name'] = function ($model) {
            return UserAccountRecord::getSwitchStatus($model->switch);
        };
        $fields['trade_type'] = function ($model) {
            $items = Constants::getTradeTypeItems();
            return $items[$model->trade_type_id] ?? '其它';
        };
        return $fields;
    }

}
