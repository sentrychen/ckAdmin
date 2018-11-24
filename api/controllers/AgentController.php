<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-08-30 18:10
 */
namespace api\controllers;

use api\models\form\AgentRegisterForm;
use Yii;
use yii\web\IdentityInterface;
use yii\web\Response;

class AgentController extends ActiveController
{
    public $modelClass = "api\models\Agent";

    public function behaviors()
    {

        $behaviors = parent::behaviors();
        $behaviors['authenticator']['optional'] = ['register'];
        return $behaviors;
    }


    public function verbs()
    {
        return [
            'register' => ['POST'],
        ];
    }

    public function actionRegister()
    {
        $model = new AgentRegisterForm();
        $model->setAttributes(Yii::$app->request->post());

        if ($user = $model->register()) {
            if (empty($user->errors)) {
                return $user;
            } else {
                return $user->errors;
            }
        } else {
            return $model->errors;
        }
    }


}
