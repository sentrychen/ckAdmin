<?php

namespace backend\controllers;

use Yii;
use backend\models\search\UserWithdrawSearch;
use backend\models\UserWithdraw;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\IndexAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;
use backend\actions\ViewAction;
use yii\web\BadRequestHttpException;
use backend\models\Daily;

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

                    $searchModel = new UserWithdrawSearch();
                    $params = yii::$app->getRequest()->getQueryParams();
                    if (empty($params)) {
                        $params = ['UserWithdrawSearch' => ['status' => UserWithdraw::STATUS_UNCHECKED]];
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
                'modelClass' => UserWithdraw::className(),
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => UserWithdraw::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => UserWithdraw::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => UserWithdraw::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => UserWithdraw::className(),
            ],
        ];
    }

    public function actionAudit($id)
    {
        $model = UserWithdraw::findOne(['id' => $id, 'status' => UserWithdraw::STATUS_UNCHECKED]);
        if (!$model)
            throw new BadRequestHttpException('存款记录不存在或无须审核');
        if (!$model->bank || $model->bank->bank_account != $model->bank_account || $model->bank->bank_name != $model->bank_name)
            throw new BadRequestHttpException('用户银行卡信息错误');
        if (yii::$app->getRequest()->getIsPost() && $model->load(yii::$app->getRequest()->post())) {

            if ($model->status != UserWithdraw::STATUS_UNCHECKED) {
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
