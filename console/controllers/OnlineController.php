<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-03-14 21:07
 */

namespace console\controllers;

use common\models\User;
use Yii;
use yii\console\ExitCode;

set_time_limit(0);

/**
 * File attach management
 */
class OnlineController extends \yii\console\Controller
{

    /**
     *统计在线用户
     */
    public function actionStat()
    {
        $models = User::find()->where(['online_status' => User::STATUS_ONLINE])->all();

        foreach ($models as $model) {
            if (!Yii::$app->redis->exists('uid:notices:' . $model->id)) {
                $model->logout();
            }
        }
        ExitCode::OK;
    }
}