<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-08-30 18:10
 */

namespace api\controllers;

use api\components\RestHttpException;
use api\models\Platform;
use common\models\PlatformUser;
use common\services\PlatformService;
use Yii;

class PlatformController extends ActiveController
{
    public $modelClass = "api\models\Platform";


    public function actionLogininfo()
    {
        $gameType = yii::$app->request->get('game_type');

        $service = new PlatformService(['userId' => yii::$app->getUser()->getId(), 'gameType' => $gameType]);

        if (!$service->getClient())
            throw new RestHttpException();

        $url = yii::$app->request->get('url', yii::$app->option->website_url);
        $amount = yii::$app->request->get('amount', 0);

        return $service->getLoginInfo($url, $amount);
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
            $service = new PlatformService(['model' => $model]);
            if ($service->getClient()) {
                try {
                    $num += $service->getAmount($amount);
                } catch (\Exception $e) {
                    yii::error($e->getMessage());
                }
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
            $service = new PlatformService(['model' => $model]);
            if ($service->getClient()) {
                try {
                    $amounts[strtolower($service->gameType)] = $service->queryAmount();
                } catch (\Exception $e) {
                    yii::error($e->getMessage());
                }
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

        $service = new PlatformService(['userId' => yii::$app->getUser()->getId(), 'gameType' => $gameType]);

        return $service->addAmount($amount);
    }
}
