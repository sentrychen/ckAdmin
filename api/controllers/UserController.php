<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-08-30 18:10
 */
namespace api\controllers;
use agent\models\form\ResetPasswordForm;
use api\components\RestHttpException;
use yii\web\Response;
use yii\web\User;
use Yii;
use yii\web\IdentityInterface;

class UserController extends ActiveController
{
    public $modelClass = "api\models\User";


    public function actions()
    {
        return [];
    }

    /*
     * 查询用户信息
     * @return json
     */
    public function actionInfo()
    {
        return Yii::$app->getUser()->getIdentity();
    }

    /*
     * 更新用户信息
     * @return json
     */
    public function actionEdit()
    {
        $user = Yii::$app->getUser()->getIdentity();
        $user->setAttributes(Yii::$app->request->post());
        if ($user->save()){
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
        $user->password_hash = Yii::$app->security->generatePasswordHash($password);;

        if ($user->save()){
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

