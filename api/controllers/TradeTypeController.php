<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/23
 * Time: 12:08
 */

namespace api\controllers;

use api\components\RestHttpException;
use api\models\UserAccountRecord;
use common\libs\Constants;
use yii\data\ActiveDataProvider;
use common\helpers\Util;
use Yii;


class TradeTypeController extends ActiveController
{
    public $modelClass = "api\models\User";


    /*
     * 交易类型列表
     * @return obj
     *
     */
    public function actionList()
    {
        return Constants::getTradeTypeItems();
    }
}
