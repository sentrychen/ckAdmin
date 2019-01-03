<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-03-14 21:07
 */

namespace console\controllers;

use common\libs\Constants;
use common\models\UserAccount;
use common\models\UserAccountRecord;
use Yii;
use yii\console\ExitCode;

set_time_limit(0);

/**
 * File attach management
 */
class XimaController extends \yii\console\Controller
{

    /**
     *洗码结算
     */
    public function actionSettle()
    {

        $models = UserAccount::find()->where(['>', 'xima_amount', 0])->all();

        /**
         * @var $model UserAccount
         */
        foreach ($models as $model) {
            $ximaAmount = $model->xima_amount;
            $model->available_amount += (float)$ximaAmount;
            $model->total_xima_amount += (float)$ximaAmount;
            $model->xima_amount = 0;

            if ($model->save(false)) {
                $userRecord = new UserAccountRecord();
                $userRecord->user_id = $model->user_id;
                $userRecord->switch = UserAccountRecord::SWITCH_IN;
                $userRecord->trade_no = $model->user_id;
                $userRecord->trade_type_id = Constants::TRADE_TYPE_XIMASETTLE;
                $userRecord->remark = '洗码收入结算';
                $userRecord->amount = $ximaAmount;
                $userRecord->after_amount = $model->available_amount;
                echo $userRecord->save(false);

            }


        }


        ExitCode::OK;
    }
}