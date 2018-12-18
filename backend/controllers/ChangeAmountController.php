<?php

namespace backend\controllers;

use Yii;
use backend\models\search\ChangeAmountRecordSearch;
use backend\models\ChangeAmountRecord;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\IndexAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;
use yii\web\BadRequestHttpException;

/**
 * ChangeAmountController implements the CRUD actions for ChangeAmountRecord model.
 */
class ChangeAmountController extends Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                /*
                'data' => function () {

                    $searchModel = new ChangeAmountRecordSearch();
                    $params = yii::$app->getRequest()->getQueryParams();
                    if (empty($params)) {
                        $params = ['ChangeAmountRecordSearch' => ['status' => ChangeAmountRecordSearch::STATUS_UNCHECKED]];
                    }
                    $dataProvider = $searchModel->search($params);
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];

                }
                */
                'data' => $this->_getGridViewData(ChangeAmountRecordSearch::class,['amount','after_amount'])
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => ChangeAmountRecord::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => ChangeAmountRecord::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => ChangeAmountRecord::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => ChangeAmountRecord::className(),
            ],
        ];
    }

    public function actionAudit($id)
    {
        $model = ChangeAmountRecord::findOne(['id' => $id, 'status' => ChangeAmountRecord::STATUS_UNCHECKED]);
        $model->scenario = 'audit';
        if (!$model)
            throw new BadRequestHttpException('上下分记录不存在或无须审核');
        if (yii::$app->getRequest()->getIsPost() && $model->load(yii::$app->getRequest()->post())) {
            if ($model->status != ChangeAmountRecord::STATUS_UNCHECKED) {
                $model->audit_by_id = yii::$app->getUser()->getId();
                $model->audit_by_name = yii::$app->getUser()->getIdentity()->username;
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
