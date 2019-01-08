<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-08-30 18:10
 */
namespace api\controllers;
use api\components\RestHttpException;
use api\models\User;
use Yii;

class UserController extends ActiveController
{
    public $modelClass = "api\models\User";

    /*
      * 查询用户信息
      * @return obj
      */
    public function actionInfo()
    {
        return Yii::$app->getUser()->getIdentity();
    }

    /**
     * 查询用户账户
     */
    public function actionAccount()
    {
        /**
         * @var $user User
         */
        $user = Yii::$app->getUser()->getIdentity();
        $free_amount = 0;
        if ($user->userStat && $user->account) {
            $free_amount = (float)$user->userStat->bet_amount - (float)$user->userStat->withdrawal_amount - (float)$user->account->frozen_withdraw_amount;
            if ($free_amount < 0) $free_amount = 0;
            else if ($free_amount > $user->account->available_amount) $free_amount = $user->account->available_amount;
        }
        $data = [
            'user_id' => $user->id,
            'username' => $user->username,
            'realname' => $user->realname,
            'mobile' => $user->mobile,
            'available_amount' => (float)($user->account ? $user->account->available_amount : 0),
            'frozen_amount' => (float)($user->account ? $user->account->frozen_amount : 0),
            'user_point' => (int)($user->account ? $user->account->user_point : 0),
            'xima_amount' => (float)($user->account ? $user->account->xima_amount : 0),
            'total_xima_amount' => (float)($user->account ? $user->account->total_xima_amount : 0),
            'free_amount' => (float)$free_amount,
            'fee_rate' => (float)(Yii::$app->option->finance_withdraw_rate ?? 0)
        ];

        return $data;

    }

    /*
     * 修改个人资料
     * @return obj
     */
    public function actionEdit()
    {
        $user = Yii::$app->getUser()->getIdentity();
        $user->setAttributes(Yii::$app->request->post());
        if ($user->save()) {
            return $user;
        }
        $errorReasons = $user->getErrors();

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
     * 修改用户密码
     */
    public function actionPassword()
    {
        /**
         * @var $user User
         */
        $user = Yii::$app->getUser()->getIdentity();
        $request = Yii::$app->request;
        $password = $request->post('password');
        $old_password = $request->post('old_password');
        if (!$user->validatePassword($old_password)) {
            throw new RestHttpException('旧密码验证失败', 400);
        }
        if (strlen($password) < 6) {
            throw new RestHttpException('密码长度不能小于6', 400);
        }
        $user->setPassword($password);
        //$user->password_hash = Yii::$app->security->generatePasswordHash($password);
        if ($user->save(false)) {
            return 'success';
        }
        $errorReasons = $user->getErrors();

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
     * 修改取款密码
     */
    public function actionPasswordPay()
    {
        /**
         * @var $user User
         */
        $user = Yii::$app->getUser()->getIdentity();
        $request = Yii::$app->request;
        $password_pay = $request->post('password_pay');
        $password = $request->post('password');
        if (!$user->validatePassword($password)) {
            throw new RestHttpException('密码验证失败', 400);
        }
        if (!preg_match("/^[\d]{6}$/", $password_pay)) {
            throw new RestHttpException('支付密码必须是6位长度的数字', 400);
        }

        $user->password_pay = Yii::$app->security->generatePasswordHash($password_pay);

        if ($user->save(false)) {
            return 'success';
        }
        $errorReasons = $user->getErrors();

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
     * 会员实名认证
     */
    public function actionRealnameAuth(){
        $user = Yii::$app->getUser()->getIdentity();
        if($user->id_card_status == User::STATUS_IDCARD_ON){
            throw new RestHttpException('您已经实名认证过了，无需重复认证！', 400);
        }
        $request = Yii::$app->request;
        $user->id_card_status = User::STATUS_IDCARD_ON;
        $user->realname = $request->post('realname');
        $user->id_card = $request->post('id_card');
        if ($user->save(false)) {
            return ['status'=>2,'info'=>'恭喜您，实名认证成功！'];
        }
        $errorReasons = $user->getErrors();

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
