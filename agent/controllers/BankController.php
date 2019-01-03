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

            $model = AgentBank::findOne($id);
            $model->status = AgentBank::STATUS_DELETE;
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
}
