<?php
/**
 * Author: ty
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2018-11-23 10:00
 */

namespace api\controllers;

use api\components\RestHttpException;
use api\models\Platform;
use api\models\PlatformGame;
use api\models\Tenant;
use Yii;
use yii\data\ActiveDataProvider;


class AppController extends ActiveController
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['optional'] = ['info'];
        return $behaviors;
    }

    /*
     * 应用信息
     * @return obj
     *
     */
    public function actionInfo()
    {
        $app_id = Yii::$app->request->get('app_id');

        $data = Tenant::findOne(['app_id' => $app_id]);
        if (!$data)
            throw new RestHttpException('错误的应用ID', 400);
        return $data->toArray();

    }
}
