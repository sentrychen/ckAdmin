<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/23
 * Time: 11:08
 */
namespace api\controllers;
use api\components\RestHttpException;
use api\models\UserDeposit;
use yii\data\ActiveDataProvider;
use Yii;

class DepositController extends ActiveController
{
    public $modelClass = "api\models\User";


    /*
     * 存款记录
     * @return obj
     */
    public function actionList()
    {
        $user = Yii::$app->getUser()->getIdentity();
        $deposit = new UserDeposit();
        $model = $deposit::find()->where(['user_id' => $user->getId()])->orderBy('id');
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
     * 存款申请
     * @return obj
     */
    public function actionApply()
    {
        $user = Yii::$app->getUser()->getIdentity();
        $deposit = new UserDeposit();
        $deposit->user_id = $user->getId();
        $deposit->setAttributes(Yii::$app->request->post());
        if ($deposit->save()) {
            return $deposit->toArray();
        }
        $errorReasons = $deposit->getErrors();

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
