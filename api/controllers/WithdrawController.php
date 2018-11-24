<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-08-30 18:10
 */

namespace api\controllers;
use api\components\RestHttpException;
use api\models\UserWithdraw;
use api\models\UserBank;
use yii\data\ActiveDataProvider;
use Yii;

class WithdrawController extends ActiveController
{
    public $modelClass = "api\models\Withdraw";

    /*
     * 取款记录
     * @return obj
     */
    public function actionList()
    {
        $user = Yii::$app->getUser()->getIdentity();
        $withdraw = new UserWithdraw();
        $model = $withdraw::find()->where(['user_id' => $user->getId()])->orderBy('id ASC');

        $request = Yii::$app->getRequest()->getQueryParams();
        if(!empty($request))
        {
            return $provider = new ActiveDataProvider([
                'query' => $model,
                'pagination' => [
                    'params' => $request,
                ],
                'sort' => [
                    'params' => $request,
                ],
            ]);
        }

        $errorReasons = $model->getErrors();
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
