<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/23
 * Time: 11:08
 */
namespace api\controllers;
use api\components\RestHttpException;
use api\models\UserDeposit;
use Yii;

class DepositController extends ActiveController
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
     * 存款记录
     * @return obj
     */
    public function actionList()
    {
        $user = Yii::$app->getUser()->getIdentity();
        $deposit = new UserDeposit();
        $result = $deposit::find()
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

    /*
     * 存款申请
     * @return obj
     */
    public function actionApply()
    {
        $user = Yii::$app->getUser()->getIdentity();
        $deposit = new UserDeposit();
        $deposit->user_id = $user->getId();
        $deposit->setAttributes(Yii::$app->request->post());
        if ($deposit->save()) {
            return $deposit->toArray();
        }
        $errorReasons = $deposit->getErrors();

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
