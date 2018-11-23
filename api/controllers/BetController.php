<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/23
 * Time: 12:06
 */

namespace api\controllers;
use api\components\RestHttpException;
use api\models\BetList;
use Yii;


class BetController extends ActiveController
{
    public $modelClass = "api\models\User";

    public function actions()
    {
        return [];
    }

    public function actionIndex()
    {
        return [
            "onetop api service"
        ];
    }

    /*
     * 银行卡列表
     * @return obj
     *
     */
    public function actionList()
    {
        $user = Yii::$app->getUser()->getIdentity();
        $bet_list = new BetList();
        $result = $bet_list::find()
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
