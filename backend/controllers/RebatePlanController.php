<?php

namespace backend\controllers;

use backend\models\Agent;
use backend\models\Platform;
use backend\models\search\RebatePlanSearch;
use backend\models\RebateLevel;
use backend\models\RebatePlan;
use common\libs\Constants;
use Yii;
use yii\base\Exception;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\web\UnprocessableEntityHttpException;

class RebatePlanController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index', $this->_getGridViewData(RebatePlanSearch::class, []));

    }

    public function actionView($id)
    {

        $model = RebatePlan::findOne($id);
        if (!$model) throw new BadRequestHttpException(yii::t('app', "Cannot find model by $id"));

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionDelete()
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
                throw new BadRequestHttpException('方案id不存在');
            }

            $model = RebatePlan::findOne($id);
            if (!$model) {
                throw new BadRequestHttpException('方案不存在');
            }

            if ($model->is_default) {
                throw new BadRequestHttpException('默认方案不可以删除');
            }

            if (Agent::findOne(['xima_plan_id' => $id])) {
                throw new BadRequestHttpException('该方案已经被代理使用，不能删除！');
            }
            if ($model->delete()) {
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

    public function actionCreate()
    {

        $model = new RebatePlan();
        if (yii::$app->getRequest()->getIsPost()) {
            $posts = yii::$app->getRequest()->post();
            $tr = Yii::$app->db->beginTransaction();
            try {

                $model->load($posts);
                if ($model->is_default) {
                    RebatePlan::updateAll(['is_default' => Constants::YesNo_No], ['agent_id' => 0]);
                }
                if (!$model->save()) {
                    $errors = $model->getFirstErrors();
                    throw new Exception(current($errors));
                }

                $platforms = Platform::find()->where(['status' => Platform::STATUS_ENABLED])->all();
                foreach ($posts['RebateLevel'] as $idx => $levelData) {
                    $levelModel = new RebateLevel(['plan_id' => $model->id]);
                    $levelModel->load($levelData, '');
                    if (!$levelModel->save()) {
                        $errors = $levelModel->getFirstErrors();
                        throw new Exception(current($errors));
                    }
                    foreach ($platforms as $platform) {
                        $rateModel = $levelModel->getRate($platform->id);
                        $rateModel->load($posts[$rateModel->formName()][$idx][$platform->id], '');
                        if (!$rateModel->save()) {

                            $errors = $rateModel->getFirstErrors();
                            throw new Exception(current($errors));
                        }
                    }

                }

                $tr->commit();
                yii::$app->getSession()->setFlash('success', yii::t('app', 'Success'));
                return $this->redirect(['index']);
            } catch (Exception $e) {
                yii::$app->getSession()->setFlash('error', $e->getMessage());
                $tr->rollBack();
            }

        }
        $model->loadDefaultValues();
        return $this->render('create', [
            'model' => $model
        ]);
    }

    public function actionUpdate($id)
    {

        $model = RebatePlan::findOne($id);
        if (yii::$app->getRequest()->getIsPost()) {
            $posts = yii::$app->getRequest()->post();
            $tr = Yii::$app->db->beginTransaction();
            try {

                $model->load($posts);
                if ($model->is_default) {
                    RebatePlan::updateAll(['is_default' => Constants::YesNo_No], ['agent_id' => 0]);
                }
                if (!$model->save()) {
                    $errors = $model->getFirstErrors();
                    throw new Exception(current($errors));
                }

                $platforms = Platform::find()->where(['status' => Platform::STATUS_ENABLED])->all();
                $ids = [];
                foreach ($posts['RebateLevel'] as $idx => $levelData) {

                    if (!empty($levelData['id'])) {
                        $levelModel = RebateLevel::findOne($levelData['id']);
                    } else {
                        $levelModel = new RebateLevel(['plan_id' => $model->id]);
                    }

                    $levelModel->load($levelData, '');

                    if (!$levelModel->save()) {
                        $errors = $levelModel->getFirstErrors();
                        throw new Exception(current($errors));
                    }
                    $ids[] = $levelModel->id;
                    foreach ($platforms as $platform) {
                        $rateModel = $levelModel->getRate($platform->id);
                        $rateModel->load($posts[$rateModel->formName()][$idx][$platform->id], '');
                        if (!$rateModel->save()) {

                            $errors = $rateModel->getFirstErrors();
                            throw new Exception(current($errors));
                        }
                    }

                }

                if (!empty($ids)) {
                    RebateLevel::deleteAll(['and', 'pland_id' => $model->id, ['not in', 'id', $ids]]);
                }
                $tr->commit();
                yii::$app->getSession()->setFlash('success', yii::t('app', 'Success'));
                return $this->redirect(['index']);
            } catch (Exception $e) {
                yii::$app->getSession()->setFlash('error', $e->getMessage());
                $tr->rollBack();
            }

        }

        return $this->render('update', [
            'model' => $model
        ]);
    }

}
