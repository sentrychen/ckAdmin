<?php

namespace agent\models;

use common\libs\Constants;
use Yii;
use yii\helpers\ArrayHelper;

class XimaPlan extends \common\models\XimaPlan
{

    public static function getDefaultPlan($type)
    {
        return static::findOne(['agent_id' => Yii::$app->getUser()->getId(), 'type' => $type, 'is_default' => Constants::YesNo_Yes]);
    }

    public static function getPlanItems($type)
    {
        $plans = self::find()->where(['agent_id' => Yii::$app->getUser()->getId(), 'type' => $type])->asArray()->all();
        return ArrayHelper::map($plans, 'id', 'name');
    }

}
