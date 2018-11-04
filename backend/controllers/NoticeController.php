<?php

namespace backend\controllers;

use Yii;
use backend\models\search\NoticeSearch;
use backend\models\Notice;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\IndexAction;
use backend\actions\DeleteAction;
use backend\actions\SortAction;
use backend\actions\ViewAction;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\web\UnprocessableEntityHttpException;

/**
 * NoticeController implements the CRUD actions for Notice model.
 */
class NoticeController extends \yii\web\Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'data' => function(){
                    
                        $searchModel = new NoticeSearch();
                        $dataProvider = $searchModel->search(yii::$app->getRequest()->getQueryParams());
                        return [
                            'dataProvider' => $dataProvider,
                            'searchModel' => $searchModel,
                        ];
                    
                }
            ],
            'view-layer' => [
                'class' => ViewAction::class,
                'modelClass' => Notice::class,
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => Notice::className(),
            ],

            'sort' => [
                'class' => SortAction::className(),
                'modelClass' => Notice::className(),
            ],
        ];
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
                throw new BadRequestHttpException('公告id不存在');
            }
            $ids = explode(',', $id);
            $errors = [];
            /* @var $model yii\db\ActiveRecord */
            $model = null;
            foreach ($ids as $one) {
                $model = call_user_func([Notice::class, 'findOne'], $one);
                if ($model) {

                    if ($model->is_deleted) {
                        $model->setScenario('delete');
                        if (!$result = $model->delete()) {
                            $errors[$one] = $model;
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
