<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/23
 * Time: 12:08
 */
namespace api\controllers;
use api\components\RestHttpException;
use api\models\Trade;
use api\models\TradeType;
use Yii;


class TradeController extends ActiveController
{
    public $modelClass = "api\models\User";


    /*
     * 银行卡列表
     * @return obj
     *
     */
    public function actionList()
    {
        $user = Yii::$app->getUser()->getIdentity();
        $trade = new Trade();
        $result = $trade::find()
            ->where(['user_id' => $user->getId()])
            ->orderBy('id')
            ->all();
        if($result)
        {
            return $result;
        }

        $errorReasons = $result->getErrors();
        if (empty($errorReasons)) {
            throw new RestHttpException();
        } else {
            $err = '';
            foreach ($errorReasons as $errorReason) {
                $err .= $errorReason[0] . '<br>';
            }
            $err = rtrim($err, '<br>');
            throw new RestHttpException($err, 400);
        }
    }

}
