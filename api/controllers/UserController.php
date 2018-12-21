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

    /*
     * 修改个人资料
     * @return obj
     */
    public function actionEdit()
    {
        $user = Yii::$app->getUser()->getIdentity();
        $user->setAttributes(Yii::$app->request->post());
        if ($user->save()) {
            return $user->toArray();
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
        $user = Yii::$app->getUser()->getIdentity();
        $request = Yii::$app->request;
        $password = $request->post('password');
        $user->password_hash = Yii::$app->security->generatePasswordHash($password);

        if ($user->save()) {
            return $user->toArray();
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
            return ['status'=>1,'info'=>'您已经实名认证过了，无需重复认证！'];
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
