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
use common\services\PlatformService;
use Yii;

class PlatformController extends ActiveController
{
    public $modelClass = "api\models\Platform";

    public function actions()
    {
        return [];
    }


    public function actionLogininfo()
    {
        $gameType = yii::$app->request->get('game_type');
        $url = yii::$app->request->get('url', yii::$app->option->website_url);
        $platform = Platform::findByCode($gameType);

        if (!$platform)
            throw new RestHttpException('游戏类型错误', 400);
        $data['user_id'] = yii::$app->getUser()->getId();
        $data['platform_id'] = $platform->id;

        $service = PlatformService::findOne($data);
        if (!$service)
            $service = new PlatformService($data);

        $info = $service->getLoginInfo($url);

        $errorReasons = $service->getErrors();

        if (empty($errorReasons)) {
            return $info;
        } else {
            $err = '';
            foreach ($errorReasons as $errorReason) {
                $err .= $errorReason[0] . '<br>';
            }
            $err = rtrim($err, '<br>');
            throw new RestHttpException($err, 400);
        }
    }

    public function actionAmount()
    {

    }

}
