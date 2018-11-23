<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/23
 * Time: 11:08
 */
namespace api\controllers;
use api\components\RestHttpException;
use api\models\UserWithdraw;
use api\models\UserBank;
use Yii;

class WithdrawsController extends ActiveController
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
     * 取款记录
     * @return obj
     */
    public function actionList()
    {
        $user = Yii::$app->getUser()->getIdentity();
        $withdraw = new UserWithdraw();
        $result = $withdraw::find()
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
     * 取款申请
     * @return obj
     */
    public function actionApply()
    {
        $user = Yii::$app->getUser()->getIdentity();
        $request = Yii::$app->request;
        $bank = UserBank::findOne($request->post('user_bank_id'));
        $withdraw = new UserWithdraw();
        $withdraw->user_id = $user->getId();
        $withdraw->status = UserWithdraw::STATUS_UNCHECKED;
        $withdraw->user_bank_id = $bank->id;
        $withdraw->bank_name = $bank->bank_username;
        $withdraw->bank_account = $bank->bank_account;
        $withdraw->setAttributes(Yii::$app->request->post());
        if ($withdraw->save()) {
            return $withdraw->toArray();
        }
        $errorReasons = $withdraw->getErrors();

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
