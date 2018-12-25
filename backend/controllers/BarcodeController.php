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
        $TwoBarCode = TwoBarCode::findOne($id);
        $TwoBarCode->status = TwoBarCode::STATUS_DELETE;
        if($TwoBarCode->save()){
            yii::$app->getSession()->setFlash('success', yii::t('app', '删除成功'));
            return $this->redirect(['index']);
        }

    }

}
