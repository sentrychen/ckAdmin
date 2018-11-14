<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-08-30 18:10
 */
namespace api\controllers;

use api\models\form\LoginForm;
use api\models\form\RegisterForm;
use api\models\User;
use Yii;
use yii\base\UserException;
use yii\web\IdentityInterface;
use yii\web\Response;

class SiteController extends ActiveController
{

    public $modelClass = "api\models\User";

    public function actions(){
        return [];
    }

    public function verbs()
    {
        return [
            'login' => ['GET'],
            'register' => ['POST'],
        ];
    }

    public function actionIndex()
    {
        return [
            "onetop api service"
        ];
    }

    public function actionLogin()
    {
        $model = new LoginForm;
        $model->setAttributes(Yii::$app->request->get());

        if ($user = $model->login()) {
            if ($user instanceof IdentityInterface) {
                return $user->api_token;
            } else {
                return $user->errors;
            }
        } else {
            return $model->errors;
        }

    }

    public function actionRegister()
    {
        $model = new RegisterForm();
        $model->setAttributes(Yii::$app->request->post());

        if ($user = $model->register()) {
            if ($user instanceof IdentityInterface) {
                Yii::$app->request->setQueryParams(Yii::$app->request->post());
                return $this->actionLogin();
            } else {
                return $user->errors;
            }
        } else {
            return $model->errors;
        }
    }


}
