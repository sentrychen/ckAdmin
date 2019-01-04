<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-08-30 18:10
 */

namespace api\controllers;

use api\components\RestException;
use api\components\RestHttpException;
use api\models\Platform;
use common\components\ApiPlatform;
use common\models\PlatformUser;
use common\services\PlatformService;
use Yii;

class PlatformController extends ActiveController
{
    public $modelClass = "api\models\Platform";


    public function actionLogininfo()
    {
        try {
            $code = yii::$app->request->get('game_type');
            $api = ApiPlatform::getApi($code, yii::$app->getUser()->getId());
            $url = yii::$app->request->get('url', yii::$app->option->website_url);
            $amount = yii::$app->request->get('amount', 0);
            return $api->getLoginInfo($url, $amount);
        } catch (\BadMethodCallException $e) {
            yii::error($e->getMessage());
            throw new RestException($e->getMessage());
        } catch (\Exception $e) {
            yii::error($e->getMessage());
            throw new RestHttpException($e->getMessage());
        }

    }

    /**
     * 回收分数
     * @return int
     * @throws RestHttpException
     */
    public function actionAmount()
    {

        $gameType = yii::$app->request->get('game_type', null);
        $amount = yii::$app->request->get('amount', 0);

        $models = PlatformUser::find()
            ->where(['user_id' => yii::$app->getUser()->getId()])
            ->andFilterWhere(['platform_code' => $gameType])->all();
        $num = 0;
        foreach ($models as $model) {
            if (!$model->platform || $model->platform->status == Platform::STATUS_DISABLED) continue;

            try {
                $api = ApiPlatform::getApi($model->platform->code, yii::$app->getUser()->getId());
                $num += $api->getAmount($amount);
            } catch (\Exception $e) {
                yii::error($e->getMessage());
            }

        }
        return $num;
    }

    /**
     * 查询分数
     * @return array
     * @throws RestHttpException
     */
    public function actionQueryAmount()
    {

        $gameType = yii::$app->request->get('game_type', null);
        $models = PlatformUser::find()
            ->where(['user_id' => yii::$app->getUser()->getId()])
            ->andFilterWhere(['platform_code' => $gameType])->all();
        $amounts = [];
        foreach ($models as $model) {
            if (!$model->platform || $model->platform->status == Platform::STATUS_DISABLED) continue;

            try {
                $api = ApiPlatform::getApi($model->platform->code, yii::$app->getUser()->getId());
                $amounts[strtolower($api->code)] = $api->queryAmount();
            } catch (\Exception $e) {
                yii::error($e->getMessage());
            }

        }
        return $amounts;
    }


    /**
     * 上分
     * @return bool|int
     * @throws RestHttpException
     */
    public function actionAddAmount()
    {
        $gameType = yii::$app->request->post('game_type', null);
        if (!$gameType)
            throw new RestHttpException('缺少游戏类型', 400);
        $amount = yii::$app->request->post('amount', 0);
        try {
            $api = ApiPlatform::getApi($gameType, yii::$app->getUser()->getId());
            return $api->addAmount($amount);
        } catch (\BadMethodCallException $e) {
            yii::error($e->getMessage());
            throw new RestException($e->getMessage());
        } catch (\Exception $e) {
            yii::error($e->getMessage());
            throw new RestHttpException($e->getMessage());
        }

    }
}
