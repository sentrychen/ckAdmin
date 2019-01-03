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
use yii\web\Response;

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
    public function actionDeletePay()
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

            $model = ThirdPayment::findOne($id);
            $model->status = ThirdPayment::STATUS_DELETE;
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
