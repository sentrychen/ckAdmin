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
use api\models\User;
use api\models\UserBank;
use yii\data\ActiveDataProvider;
use api\models\UserAccount;
use common\helpers\Util;
use yii\db\Exception as dbException;
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
        $request = Yii::$app->getRequest()->getQueryParams();
        $model = $withdraw::find()->where(['user_id' => $user->getId()]);
        if(isset($request['startDate']) && $request['startDate']!='') {
            $model->andFilterWhere(Util::getBetweenDate('created_at',$request));
        }
        $model->orderBy('id DESC');
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
        if($user->id_card_status == User::STATUS_IDCARD_OFF){
            return ['status'=>'1','info'=>'您还未实名认证，请先实名认证再申请取款！'];
        }
        $request = Yii::$app->request;
        $condition = [
            'id' => $request->post('user_bank_id'),
            'user_id' => $user->getId(),
            'status' => UserBank::BANK_STATUS_ON
        ];
        $bank = UserBank::find()->where($condition)->one();
        if(!$bank){
            return ['status'=>'2','info'=>'银行卡不存在！'];
        }

        $withdraw = new UserWithdraw();
        $withdraw->user_id = $user->getId();
        $withdraw->status = UserWithdraw::STATUS_UNCHECKED;
        $withdraw->user_bank_id = $bank->id;
        $withdraw->bank_name = $bank->bank_name;
        $withdraw->bank_account = $bank->bank_account;
        $amount = Yii::$app->request->post('apply_amount');
        if ($user->account->available_amount < $amount)
            throw new dbException('用户资金不足！');
        $withdraw->setAttributes(Yii::$app->request->post());
        if ($withdraw->save()) {
            $userAccount = UserAccount::findOne(['user_id' => $user->getId()]);
            if (!$userAccount)
                throw new dbException('用户资金账户不存在！');
            //更新用户额度
            $userAccount->frozen_amount += Yii::$app->request->post('apply_amount');
            $userAccount->available_amount -= Yii::$app->request->post('apply_amount');
            if (!$userAccount->save(false))
                throw new dbException('更新用户资金账户失败！');
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
