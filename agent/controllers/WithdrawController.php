<?php

namespace agent\controllers;

use agent\models\AgentBank;
use Yii;
use agent\models\search\AgentWithdrawSearch;
use agent\models\AgentWithdraw;
use common\models\AgentAccount;
use agent\actions\CreateAction;
use agent\actions\UpdateAction;
use agent\actions\IndexAction;
use agent\actions\DeleteAction;
use agent\actions\SortAction;
use agent\actions\ViewAction;
use yii\web\BadRequestHttpException;


/**
 * WithdrawController implements the CRUD actions for UserWithdraw model.
 */
class WithdrawController extends \yii\web\Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function(){

                    $searchModel = new AgentWithdrawSearch();
                    $params = yii::$app->getRequest()->getQueryParams();
                    if (empty($params)) {
                        $params = ['AgentWithdrawSearch' => ['status' => AgentWithdraw::STATUS_UNCHECKED]];
                    }
                    $dataProvider = $searchModel->search($params);
                        return [
                            'dataProvider' => $dataProvider,
                            'searchModel' => $searchModel,
                        ];
                    
                }
            ],
            'view-layer' => [
                'class' => ViewAction::className(),
                'modelClass' => AgentWithdraw::className(),
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => AgentWithdraw::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => AgentWithdraw::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => AgentWithdraw::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => AgentWithdraw::className(),
            ],
        ];
    }

    public function actionAdd(){
        $agent = yii::$app->getUser()->getIdentity();
        $model = new AgentWithdraw();
        $agentAccount = AgentAccount::findOne($agent->getId());

        if (yii::$app->getRequest()->getIsPost()) {

            $request = yii::$app->getRequest()->post('AgentWithdraw');
            $bankId = $request['agent_bank_id'];
            $agentBank = AgentBank::findOne($bankId);
            $model->agent_id = $agent->getId();
            $model->bank_name = $agentBank->bank_name;
            $model->bank_account = $agentBank->bank_account;
            $model->apply_ip = yii::$app->getRequest()->userIP;
            $model->status = AgentWithdraw::STATUS_UNCHECKED;

            $agentAccount->available_amount -= $request['apply_amount'];
            $agentAccount->frozen_amount += $request['apply_amount'];

            if($agentAccount->available_amount<$request['apply_amount']){
                yii::$app->getSession()->setFlash('error', '取款金额大于账户可用余额');
                return $this->redirect(['add']);
            }

            if ($model->load(yii::$app->getRequest()->post()) && $model->save(false)
                && $agentAccount->save(false)) {
                yii::$app->getSession()->setFlash('success', yii::t('app', 'Success'));
                return $this->redirect(['index']);
            } else {
                $errors = $model->getErrors();
                $err = '';
                foreach ($errors as $v) {
                    $err .= $v[0] . '<br>';
                }
                yii::$app->getSession()->setFlash('error', $err);
            }
        }
        $model->loadDefaultValues();
        return $this->render('add', [
            'model' => $model,
            'agentAccount'=>$agentAccount,
        ]);

    }

    public function actionAudit($id)
    {
        $model = AgentWithdraw::findOne(['id' => $id, 'status' => AgentWithdraw::STATUS_UNCHECKED]);
        if (!$model)
            throw new BadRequestHttpException('存款记录不存在或无须审核');
        if (!$model->bank || $model->bank->bank_account != $model->bank_account || $model->bank->bank_name != $model->bank_name)
            throw new BadRequestHttpException('用户银行卡信息错误');
        if (yii::$app->getRequest()->getIsPost() && $model->load(yii::$app->getRequest()->post())) {

            if ($model->status != AgentWithdraw::STATUS_UNCHECKED) {
                $model->audit_by_id = yii::$app->getUser()->getId();
                $model->audit_by_username = yii::$app->getUser()->getIdentity()->username;
                $model->audit_at = time();
            }

            if ($model->save()) {
                yii::$app->getSession()->setFlash('success', yii::t('app', 'Success'));
                return $this->redirect(['index']);
            }

            $errors = $model->getErrors();
            $err = '';
            foreach ($errors as $v) {
                $err .= $v[0] . '<br>';
            }
            yii::$app->getSession()->setFlash('error', $err);

        }
        $model->loadDefaultValues();
        return $this->render('audit', [
            'model' => $model
        ]);
    }
}
