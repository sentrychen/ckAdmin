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
        $CompanyBank = CompanyBank::findOne($id);
        $CompanyBank->status = $CompanyBank::STATUS_DELETE;
        if($CompanyBank->save()){
            yii::$app->getSession()->setFlash('success', yii::t('app', '删除成功'));
            return $this->redirect(['index']);
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
