<?php

namespace backend\controllers;
use Yii;
use backend\models\TwoBarCode;
use backend\actions\ViewAction;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\IndexAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\web\UnprocessableEntityHttpException;

class BarcodeController extends \yii\web\Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function(){

                    $searchModel = new TwoBarCode();
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];

                }
            ],
            'view-layer' => [
                'class' => ViewAction::className(),
                'modelClass' => TwoBarCode::className(),
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => TwoBarCode::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => TwoBarCode::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => TwoBarCode::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => TwoBarCode::className(),
            ],
        ];
    }

    /*
   * 删除二维码
   * @param int $id 表ID
   * @return bool
   */
    public function actionDeleteBarcode($id=0)
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

            $model = TwoBarCode::findOne($id);
            $model->status = TwoBarCode::STATUS_DELETE;
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
