<?php

namespace backend\controllers;

use common\models\MessageFlag;
use Yii;
use backend\models\search\MessageSearch;
use backend\models\Message;
use backend\actions\ViewAction;

use backend\actions\IndexAction;

use backend\actions\SortAction;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\web\UnprocessableEntityHttpException;

/**
 * MessageController implements the CRUD actions for Message model.
 */
class MessageController extends \yii\web\Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::class,
                'data' => function () {

                    $searchModel = new MessageSearch();
                    $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                    return [
                        'dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                    ];

                }
            ],
            'view-layer' => [
                'class' => ViewAction::class,
                'modelClass' => Message::class,
            ],
            'sort' => [
                'class' => SortAction::class,
                'modelClass' => Message::class,
            ],
        ];
    }

    public function actionGroup()
    {
        $model = new Message();
        //$model->scenario = 'create';
        $model->notify_obj = Message::SEND_ALL;
        if (yii::$app->getRequest()->getIsPost()) {
            $model->sender_id = yii::$app->getUser()->getId();
            $model->sender_name = yii::$app->getUser()->getIdentity()->username;
            if ($model->load(yii::$app->getRequest()->post()) && $model->save()) {
                yii::$app->getSession()->setFlash('success', yii::t('app', 'Success'));
                return $this->redirect(['index']);
            } else {
                $errors = $model->getErrors();
                $err = '';
                foreach ($errors as $v) {
                    $err .= $v[0] . '<br>';
                }
                yii::$app->getSession()->setFlash('error', $err);
            }
        }
        $model->loadDefaultValues();
        return $this->render('group', [
            'model' => $model
        ]);

    }

    public function actionDelete()
    {
        if (yii::$app->getRequest()->getIsPost()) {
            $id = yii::$app->getRequest()->get('id', null);
            $param = yii::$app->getRequest()->post('id', null);
            if($param !== null){
                $id = $param;
            }


            if( yii::$app->getRequest()->getIsAjax() ){
                yii::$app->getResponse()->format = Response::FORMAT_JSON;
            }

            if (!$id) {
                throw new BadRequestHttpException('消息id不存在');
            }
            $ids = explode(',', $id);
            $errors = [];
            /* @var $model yii\db\ActiveRecord */
            $model = null;
            foreach ($ids as $one) {
                $model = call_user_func([Message::class, 'findOne'], $one);
                if ($model) {

                    if ($model->is_deleted) {
                        $model->setScenario('delete');
                        if (!$result = $model->delete()) {
                            $errors[$one] = $model;
                        }else{
                            MessageFlag::deleteAll(['message_id'=>$one]);
                        }
                    } else {
                        $model->is_deleted = 1;
                        $model->deleted_at = time();
                        $model->save(false);
                    }

                }
            }
            if (count($errors) == 0) {
                if (!yii::$app->getRequest()->getIsAjax()) return $this->redirect(yii::$app->getRequest()->headers['referer']);
                return [];
            } else {
                $err = '';
                foreach ($errors as $one => $model) {
                    $err .= $one . ':';
                    $errorReasons = $model->getErrors();
                    foreach ($errorReasons as $errorReason) {
                        $err .= $errorReason[0] . ';';
                    }
                    $err = rtrim($err, ';') . '<br>';
                }
                $err = rtrim($err, '<br>');
                throw new UnprocessableEntityHttpException($err);
            }
        }

    }
}
