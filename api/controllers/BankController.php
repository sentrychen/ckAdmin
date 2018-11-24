<?php
/**
 * Author: ty
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2018-11-23 10:00
 */
namespace api\controllers;
use api\components\RestHttpException;
use api\models\UserBank;
use Yii;


class BankController extends ActiveController
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
        $bank = new UserBank();
        $result = $bank::find()
            ->where(['user_id' => $user->getId(),'status'=>1])
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
     * 新建银行卡
     * @return obj
     *
     */
    public function actionAdd()
    {
        $user = Yii::$app->getUser()->getIdentity();
        $bank = new UserBank();
        $bank->user_id = $user->getId();
        $bank->username = $user->username;
        $bank->setAttributes(Yii::$app->request->post());
        if ($bank->save()) {
            return $bank->toArray();
        }
        $errorReasons = $bank->getErrors();

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
     * 编辑银行卡
     * @return obj
     *
     */
    public function actionEdit()
    {
        $user = Yii::$app->getUser()->getIdentity();
        $request =  Yii::$app->request;
        $bank = UserBank::findOne($request->post('id'));
        $bank->user_id = $user->getId();
        $bank->username = $user->username;
        $bank->setAttributes($request->post());
        if ($bank->save()) {
            return $bank->toArray();
        }
        $errorReasons = $bank->getErrors();

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
