<?php

namespace backend\controllers;

use backend\models\Platform;
use backend\models\PlatformXima;
use backend\models\search\XimaPlanSearch;
use backend\models\User;
use backend\models\XimaLevel;
use backend\models\XimaPlan;
use common\libs\Constants;
use Yii;
use yii\base\Exception;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\web\UnprocessableEntityHttpException;

class XimaPlanController extends Controller
{

    public function actionAgent()
    {
        return $this->render('agent', $this->_getGridViewData(XimaPlanSearch::class, [], XimaPlan::TYPE_AGENT));

    }

    public function actionUser()
    {
        return $this->render('user', $this->_getGridViewData(XimaPlanSearch::class, [], XimaPlan::TYPE_USER));
    }

    public function actionUserView($id)
    {

        $model = XimaPlan::findOne($id);
        if (!$model) throw new BadRequestHttpException(yii::t('app', "Cannot find model by $id"));

        return $this->render('user-view', [
            'model' => $model,
        ]);
    }

    public function actionUserDelete()
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

            $model = XimaPlan::findOne($id);
            if (!$model) {
                throw new BadRequestHttpException('方案不存在');
            }

            if ($model->is_default) {
                throw new BadRequestHttpException('默认方案不可以删除');
            }

            if (User::findOne(['xima_plan_id' => $id])) {
                throw new BadRequestHttpException('该方案已经被用户使用，不能删除！');
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

    public function actionUserCreate()
    {

        $model = new XimaPlan(['type' => XimaPlan::TYPE_USER]);
        if (yii::$app->getRequest()->getIsPost()) {
            $posts = yii::$app->getRequest()->post();
            $tr = Yii::$app->db->beginTransaction();
            try {

                $model->load($posts);
                if ($model->is_default) {
                    XimaPlan::updateAll(['is_default' => Constants::YesNo_No], ['type' => XimaPlan::TYPE_USER, 'agent_id' => 0]);
                }
                if (!$model->save()) {
                    $errors = $model->getFirstErrors();
                    throw new Exception(reset($errors));
                }


                $levelModel = new XimaLevel(['plan_id' => $model->id]);

                $levelModel->load($posts);
                if (!$levelModel->save()) {
                    $errors = $levelModel->getFirstErrors();
                    throw new Exception(reset($errors));
                }
                $platforms = Platform::find()->where(['status' => Platform::STATUS_ENABLED])->all();

                foreach ($platforms as $platform) {
                    $rateModel = new PlatformXima(['xima_level_id' => $levelModel->id, 'platform_id' => $platform->id]);

                    $rateModel->load($posts[$rateModel->formName()][$platform->id], '');
                    if (!$rateModel->save()) {

                        $errors = $rateModel->getFirstErrors();
                        //var_dump($platform->id);
                        //var_dump($posts[$rateModel->formName()]);
                        throw new Exception(reset($errors));
                    }
                }

                $tr->commit();
                yii::$app->getSession()->setFlash('success', yii::t('app', 'Success'));
                return $this->redirect(['user']);
            } catch (Exception $e) {
                yii::$app->getSession()->setFlash('error', $e->getMessage());
                $tr->rollBack();
            }

        }
        $model->loadDefaultValues();
        return $this->render('user-create', [
            'model' => $model
        ]);
    }

    public function actionUserUpdate($id)
    {

        $model = XimaPlan::findOne($id);
        if (yii::$app->getRequest()->getIsPost()) {
            $posts = yii::$app->getRequest()->post();
            $tr = Yii::$app->db->beginTransaction();
            try {

                $model->load($posts);
                if ($model->is_default) {
                    XimaPlan::updateAll(['is_default' => Constants::YesNo_No], ['type' => XimaPlan::TYPE_USER, 'agent_id' => 0]);
                }
                if (!$model->save()) {
                    $errors = $model->getFirstErrors();
                    throw new Exception(reset($errors));
                }

                $levelModel = current($model->levels);
                $levelModel->load($posts);
                if (!$levelModel->save()) {
                    $errors = $levelModel->getFirstErrors();
                    throw new Exception(reset($errors));
                }
                $platforms = Platform::find()->where(['status' => Platform::STATUS_ENABLED])->all();

                foreach ($platforms as $platform) {
                    $rateModel = $levelModel->getRate($platform->id);

                    $rateModel->load($posts[$rateModel->formName()][$platform->id], '');
                    if (!$rateModel->save()) {

                        $errors = $rateModel->getFirstErrors();
                        //var_dump($platform->id);
                        //var_dump($posts[$rateModel->formName()]);
                        throw new Exception(reset($errors));
                    }
                }

                $tr->commit();
                yii::$app->getSession()->setFlash('success', yii::t('app', 'Success'));
                return $this->redirect(['user']);
            } catch (Exception $e) {
                yii::$app->getSession()->setFlash('error', $e->getMessage());
                $tr->rollBack();
            }

        }

        return $this->render('user-update', [
            'model' => $model
        ]);
    }

}
