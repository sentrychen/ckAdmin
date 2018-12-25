<?php

namespace agent\controllers;

use Yii;
use agent\models\search\AgentBankSearch;
use agent\models\AgentBank;
use agent\actions\CreateAction;
use agent\actions\UpdateAction;
use agent\actions\IndexAction;
use agent\actions\DeleteAction;
use agent\actions\SortAction;
use agent\actions\ViewAction;
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
                    
                        $searchModel = new AgentBankSearch();
                        $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                        return [
                            'dataProvider' => $dataProvider,
                            'searchModel' => $searchModel,
                        ];
                    
                }
            ],
            'view-layer' => [
                'class' => ViewAction::className(),
                'modelClass' => AgentBank::className(),
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => AgentBank::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => AgentBank::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => AgentBank::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => AgentBank::className(),
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
        $bank = AgentBank::findOne($id);
        $bank->status = AgentBank::STATUS_DELETE;
        if($bank->save()){
            yii::$app->getSession()->setFlash('success', yii::t('app', '删除成功'));
            return $this->redirect(['index']);
        }

    }
}
