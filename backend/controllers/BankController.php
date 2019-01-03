<?php

namespace backend\controllers;

use Yii;
use backend\models\search\CompanyBankSearch;
use backend\models\CompanyBank;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\IndexAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;
use backend\actions\ViewAction;
use backend\models\UserDeposit;
use backend\models\search\UserDepositSearch;
use yii\web\Response;
/**
 * BankController implements the CRUD actions for CompanyBank model.
 */
class BankController extends \yii\web\Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function(){
                    
                        $searchModel = new CompanyBankSearch();
                        $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                        return [
                            'dataProvider' => $dataProvider,
                            'searchModel' => $searchModel,
                        ];
                    
                }
            ],
            'view-layer' => [
                'class' => ViewAction::className(),
                'modelClass' => CompanyBank::className(),
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => CompanyBank::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => CompanyBank::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => CompanyBank::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => CompanyBank::className(),
            ],
        ];
    }
    /*
    * 删除银行卡
    * @param int $id 表ID
    * @return bool
    */
    public function actionDeleteBank($id=0)
    {

        if (yii::$app->getRequest()->getIsPost()) {
            $id = yii::$app->getRequest()->get('id', null);
            $param = yii::$app->getRequest()->post('id', null);
            if ($param !== null) {
                $id = $param;
            }


            if (yii::$app->getRequest()->getIsAjax()) {
                yii::$app->getResponse()->format = Response::FORMAT_JSON;
            }

            if (!$id) {
                throw new BadRequestHttpException('id不存在');
            }

            $model = CompanyBank::findOne($id);
            $model->status = CompanyBank::STATUS_DELETE;
            if (!$model) {
                throw new BadRequestHttpException('数据不存在');
            }


            if ($model->save()) {
                if (!yii::$app->getRequest()->getIsAjax()) return $this->redirect(yii::$app->getRequest()->headers['referer']);
                return [];
            } else {

                $errorReasons = $model->getErrors();
                $err = '';
                foreach ($errorReasons as $errorReason) {
                    $err .= $errorReason[0] . ';';
                }
                $err = rtrim($err, ';') . '<br>';
                throw new UnprocessableEntityHttpException($err);
            }
        }

    }

    public function actionReport()
    {
        $searchModel = new UserDepositSearch();
        $params = yii::$app->getRequest()->getQueryParams();
        if (empty($params)) {
            $params = ['UserDepositSearch' => ['status' => UserDeposit::STATUS_UNCHECKED]];
        }
        $dataProvider = $searchModel->search($params);
        return $this->render('report', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);

    }
}
