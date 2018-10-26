<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-08-30 18:10
 */
namespace api\controllers;

use api\models\form\LoginForm;
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
            "feehi api service"
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
        return [
            "success" => true
        ];
    }


}
