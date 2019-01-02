<?php

namespace agent\controllers;

use agent\models\{
    Agent, Platform, PlatformXima, search\XimaPlanSearch, User, XimaLevel, XimaPlan
};
use common\libs\Constants;
use Yii;
use yii\base\Exception;
use yii\web\{
    BadRequestHttpException, Response, UnprocessableEntityHttpException
};

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
                $model->agent_id = Yii::$app->getUser()->getId();
                if ($model->is_default) {
                    XimaPlan::updateAll(['is_default' => Constants::YesNo_No], ['type' => XimaPlan::TYPE_USER, 'agent_id' => Yii::$app->getUser()->getId()]);
                }
                if (!$model->save()) {
                    $errors = $model->getFirstErrors();
                    throw new Exception(current($errors));
                }


                $levelModel = new XimaLevel(['plan_id' => $model->id]);

                $levelModel->load($posts);
                if (!$levelModel->save()) {
                    $errors = $levelModel->getFirstErrors();
                    throw new Exception(current($errors));
                }
                $platforms = Platform::find()->where(['status' => Platform::STATUS_ENABLED])->all();

                foreach ($platforms as $platform) {
                    $rateModel = $levelModel->getRate($platform->id);
                    $rateModel->load($posts[$rateModel->formName()][$platform->id], '');
                    if (!$rateModel->save()) {

                        $errors = $rateModel->getFirstErrors();
                        //var_dump($platform->id);
                        //var_dump($posts[$rateModel->formName()]);
                        throw new Exception(current($errors));
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
                    XimaPlan::updateAll(['is_default' => Constants::YesNo_No], ['type' => XimaPlan::TYPE_USER, 'agent_id' => Yii::$app->getUser()->getId()]);
                }
                if (!$model->save()) {
                    $errors = $model->getFirstErrors();
                    throw new Exception(current($errors));
                }

                if($model->levels){
                    $levelModel = current($model->levels);
                }else{
                    $levelModel = new XimaLevel(['plan_id' => $model->id]);
                }

                $levelModel->load($posts);
                if (!$levelModel->save()) {
                    $errors = $levelModel->getFirstErrors();
                    throw new Exception(current($errors));
                }
                $platforms = Platform::find()->where(['status' => Platform::STATUS_ENABLED])->all();

                foreach ($platforms as $platform) {
                    $rateModel = $levelModel->getRate($platform->id);

                    $rateModel->load($posts[$rateModel->formName()][$platform->id], '');
                    if (!$rateModel->save()) {

                        $errors = $rateModel->getFirstErrors();
                        //var_dump($platform->id);
                        //var_dump($posts[$rateModel->formName()]);
                        throw new Exception(current($errors));
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


    public function actionAgentView($id)
    {

        $model = XimaPlan::findOne($id);
        if (!$model) throw new BadRequestHttpException(yii::t('app', "Cannot find model by $id"));

        return $this->render('agent-view', [
            'model' => $model,
        ]);
    }

    public function actionAgentDelete()
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

    public function actionAgentCreate()
    {

        $model = new XimaPlan(['type' => XimaPlan::TYPE_AGENT]);
        if (yii::$app->getRequest()->getIsPost()) {
            $posts = yii::$app->getRequest()->post();
            $tr = Yii::$app->db->beginTransaction();
            try {

                $model->load($posts);
                $model->agent_id = Yii::$app->getUser()->getId();
                if ($model->is_default) {
                    XimaPlan::updateAll(['is_default' => Constants::YesNo_No], ['type' => XimaPlan::TYPE_AGENT, 'agent_id' => Yii::$app->getUser()->getId()]);
                }
                if (!$model->save()) {
                    $errors = $model->getFirstErrors();
                    throw new Exception(current($errors));
                }

                $platforms = Platform::find()->where(['status' => Platform::STATUS_ENABLED])->all();
                foreach ($posts['XimaLevel'] as $idx => $levelData) {
                    $levelModel = new XimaLevel(['plan_id' => $model->id]);
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
                return $this->redirect(['agent']);
            } catch (Exception $e) {
                yii::$app->getSession()->setFlash('error', $e->getMessage());
                $tr->rollBack();
            }

        }
        $model->loadDefaultValues();
        return $this->render('agent-create', [
            'model' => $model
        ]);
    }

    public function actionAgentUpdate($id)
    {

        $model = XimaPlan::findOne($id);
        if (yii::$app->getRequest()->getIsPost()) {
            $posts = yii::$app->getRequest()->post();
            $tr = Yii::$app->db->beginTransaction();
            try {

                $model->load($posts);
                if ($model->is_default) {
                    XimaPlan::updateAll(['is_default' => Constants::YesNo_No], ['type' => XimaPlan::TYPE_AGENT, 'agent_id' => Yii::$app->getUser()->getId()]);
                }
                if (!$model->save()) {
                    $errors = $model->getFirstErrors();
                    throw new Exception(current($errors));
                }

                $platforms = Platform::find()->where(['status' => Platform::STATUS_ENABLED])->all();
                $ids = [];
                foreach ($posts['XimaLevel'] as $idx => $levelData) {

                    if (!empty($levelData['id'])) {
                        $levelModel = XimaLevel::findOne($levelData['id']);
                    } else {
                        $levelModel = new XimaLevel(['plan_id' => $model->id]);
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
                    $levels = XimaLevel::find()->where(['plan_id' => $model->id])->andWhere(['not in', 'id', $ids])->all();
                    foreach ($levels as $level) {
                        PlatformXima::deleteAll(['xima_level_id' => $level->id]);
                        $level->delete();
                    }
                }
                $tr->commit();
                yii::$app->getSession()->setFlash('success', yii::t('app', 'Success'));
                return $this->redirect(['agent']);
            } catch (Exception $e) {
                yii::$app->getSession()->setFlash('error', $e->getMessage());
                $tr->rollBack();
            }

        }

        return $this->render('agent-update', [
            'model' => $model
        ]);
    }

}
