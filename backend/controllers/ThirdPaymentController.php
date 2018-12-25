<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/25
 * Time: 11:27
 */

namespace backend\controllers;
use Yii;
use backend\models\ThirdPayment;
use backend\actions\ViewAction;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\IndexAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;

class ThirdPaymentController extends Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function(){

                    $searchModel = new ThirdPayment();
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];

                }
            ],
            'view-layer' => [
                'class' => ViewAction::className(),
                'modelClass' => ThirdPayment::className(),
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => ThirdPayment::className(),
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => ThirdPayment::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => ThirdPayment::className(),
            ],
            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => ThirdPayment::className(),
            ],
        ];
    }

    /*
   * 删除第三方支付
   * @param int $id 表ID
   * @return bool
   */
    public function actionDeletePay($id=0)
    {
        $payment = ThirdPayment::findOne($id);
        $payment->status = ThirdPayment::STATUS_DELETE;
        if($payment->save()){
            yii::$app->getSession()->setFlash('success', yii::t('app', '删除成功'));
            return $this->redirect(['index']);
        }

    }

}
