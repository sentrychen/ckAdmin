<?php
/**
 * Author: ty
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2018-11-23 10:00
 */
namespace api\controllers;
use api\components\RestHttpException;
use api\models\UserBank;
use api\models\User;
use api\models\CompanyBank;
use api\models\TwoBarCode;
use yii\data\ActiveDataProvider;
use Yii;


class BankController extends ActiveController
{
    public $modelClass = "api\models\User";

    /*
     * 银行卡列表
     * @return obj
     *
     */
    public function actionList()
    {
        $user = Yii::$app->getUser()->getIdentity();
        $bank = new UserBank();
        $model = $bank::find()->where(['user_id' => $user->getId(),'status'=>1])->orderBy('id');
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
     * 新建银行卡
     * @return obj
     *
     */
    public function actionAdd()
    {
        $user = Yii::$app->getUser()->getIdentity();
        // if($user->id_card_status == User::STATUS_IDCARD_OFF){
        //    return ['status'=>'1','info'=>'您还未实名认证，请先实名认证再绑定银行卡'];
        //}
        $bank_username = Yii::$app->request->post('bank_username');
        $bank_account = Yii::$app->request->post('bank_account');
        //if($user->realname != $bank_username){
        //    return ['status'=>'2','info'=>'添加银行卡失败，开户名称须与平台已实名认证的姓名一致！'];
        // }
        $query = UserBank::findOne(['user_id'=>$user->getId(),'bank_account'=>$bank_account]);
        if($query && isset($query->bank_account)){
            return ['status'=>'3','info'=>'您当前银行卡已绑定，无需重复绑卡！'];
        }

        $bank = new UserBank();
        $bank->user_id = $user->getId();
        $bank->username = $user->username;
        $bank->setAttributes(Yii::$app->request->post());
        if ($bank->save()) {
            return $bank->toArray();
        }
        $errorReasons = $bank->getErrors();

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
     * 编辑银行卡
     * @return obj
     *
     */
    public function actionEdit()
    {
        $user = Yii::$app->getUser()->getIdentity();
        $request =  Yii::$app->request;
        $bank = UserBank::findOne($request->post('id'));
        $bank->user_id = $user->getId();
        $bank->username = $user->username;
        $bank->setAttributes($request->post());
        if ($bank->save()) {
            return $bank->toArray();
        }
        $errorReasons = $bank->getErrors();

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
     * 公司银行卡
     *
     **/
    public function actionCompanyBank()
    {
        $user = Yii::$app->getUser()->getIdentity();
        if($user){
            $companyBank = CompanyBank::find()->where(['status'=>1])->orderBy('updated_at desc,id desc')->limit(1)->one();
            if($companyBank){
                return $companyBank;
            }
            $errorReasons = $companyBank->getErrors();

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
        return [];
    }

    /*
     * 公司银行卡
     *
     **/
    public function actionBarCode()
    {
        $user = Yii::$app->getUser()->getIdentity();
        if($user){
            $companyBank = TwoBarCode::find()->where(['status'=>1])->orderBy('updated_at desc,id desc')->limit(1)->one();
            if($companyBank){
                return $companyBank;
            }
            $errorReasons = $companyBank->getErrors();

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
        return [];
    }
}
