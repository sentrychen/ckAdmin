<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/8
 * Time: 15:50
 */

namespace backend\controllers;

use backend\models\AgentBank;
use Yii;
use backend\models\search\AgentWithdrawSearch;
use backend\models\AgentWithdraw;
use common\models\AgentAccount;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\IndexAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;
use backend\actions\ViewAction;
use yii\web\BadRequestHttpException;


/**
 * WithdrawController implements the CRUD actions for UserWithdraw model.
 */
class AgentWithdrawController extends Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                /*
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
                */
                'data' => $this->_getGridViewData(AgentWithdrawSearch::class,[
                    'apply_amount','transfer_amount','frozen_amount'
                ])
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


    public function actionAudit($id)
    {
        $model = AgentWithdraw::findOne(['id' => $id, 'status' => AgentWithdraw::STATUS_UNCHECKED]);
        if (!$model)
            throw new BadRequestHttpException('存款记录不存在或无须审核');
        if (!$model->bank || $model->bank->bank_account != $model->bank_account || $model->bank->bank_name != $model->bank_name)
            throw new BadRequestHttpException('代理银行卡信息错误');
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
