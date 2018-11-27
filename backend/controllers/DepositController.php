<?php

namespace backend\controllers;

use backend\actions\CreateAction;
use backend\actions\DeleteAction;
use backend\actions\IndexAction;
use backend\actions\SortAction;
use backend\actions\UpdateAction;
use backend\actions\ViewAction;
use backend\models\search\UserDepositSearch;
use backend\models\UserDeposit;
use Yii;
use backend\models\Daily;
use yii\web\BadRequestHttpException;

/**
 * DepositController implements the CRUD actions for UserDeposit model.
 */
class DepositController extends \yii\web\Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function () {

                    $searchModel = new UserDepositSearch();
                    $params = yii::$app->getRequest()->getQueryParams();
                    if (empty($params)) {
                        $params = ['UserDepositSearch' => ['status' => UserDeposit::STATUS_UNCHECKED]];
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
                'modelClass' => UserDeposit::className(),
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => UserDeposit::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => UserDeposit::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => UserDeposit::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => UserDeposit::className(),
            ],
        ];
    }

    public function actionAudit($id)
    {
        $model = UserDeposit::findOne(['id' => $id, 'status' => UserDeposit::STATUS_UNCHECKED]);
        if (!$model)
            throw new BadRequestHttpException('存款记录不存在或无须审核');
        if (yii::$app->getRequest()->getIsPost() && $model->load(yii::$app->getRequest()->post())) {
            //$model->status = UserDeposit::STATUS_CHECKED;
            if ($model->status != UserDeposit::STATUS_UNCHECKED) {
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
