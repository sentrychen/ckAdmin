<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-08-30 18:10
 */
namespace api\controllers;

use api\components\RestHttpException;
use api\models\form\LoginForm;
use api\models\form\RegisterForm;
use Yii;
use yii\web\IdentityInterface;

class SiteController extends ActiveController
{

    public $modelClass = "api\models\User";

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['optional'] = ['register', 'login', 'logout'];
        return $behaviors;
    }

    public function actionLogin()
    {
        $model = new LoginForm;
        $model->setAttributes(Yii::$app->request->post());
        $user = $model->login();

        if ($user instanceof IdentityInterface) {
            return $user->api_token;
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

    public function actionLogout()
    {
        $user = Yii::$app->getUser()->getIdentity();
        if ($user) {
            $user->api_token = null;
            $user->save(false);
            Yii::$app->getUser()->logout(false);
        }
        return 'logout';
    }

    public function actionRegister()
    {
        $model = new RegisterForm();
        $model->setAttributes(Yii::$app->request->post());
        $user = $model->register();
        if ($user instanceof IdentityInterface) {
            Yii::$app->request->setQueryParams(Yii::$app->request->post());
            return $this->actionLogin();
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


}
