<?php

namespace agent\models;

use common\libs\Constants;
use Yii;
use yii\helpers\ArrayHelper;


class RebatePlan extends \common\models\RebatePlan
{
    public static function getDefaultPlan()
    {
        return static::findOne(['agent_id' => Yii::$app->getUser()->getId(), 'is_default' => Constants::YesNo_Yes]);
    }

    public static function getPlanItems()
    {
        $plans = self::find()->where(['agent_id' => Yii::$app->getUser()->getId()])->asArray()->all();
        return ArrayHelper::map($plans, 'id', 'name');
    }

}
