<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/23
 * Time: 12:06
 */

namespace api\controllers;
use api\components\RestHttpException;
use api\models\BetList;
use api\models\Platform;
use yii\data\ActiveDataProvider;
use common\helpers\Util;
use Yii;

class BetController extends ActiveController
{
    public $modelClass = "api\models\User";


    /*
     * 银行卡列表
     * @return obj
     *
     */
    public function actionList()
    {

        $user = Yii::$app->getUser()->getIdentity();
        $bet_list = new BetList();
        $request = Yii::$app->getRequest()->getQueryParams();
        $model = $bet_list::find()->where(['user_id' => $user->getId()]);
        if(isset($request['startDate']) && $request['startDate']!='') {
            $model->andFilterWhere(Util::getBetweenDate('bet_at',$request));
        }
        if (!empty($request['platform_code'])) {
            $platform = Platform::findByCode($request['platform_code']);
            $model->andWhere(['platform_id' => ($platform ? $platform->id : 0)]);
        }
        if (!empty($request['game_type']))
            $model->andWhere(['game_type' => $request['game_type']]);
        $model->orderBy('id desc');

        if(!empty($request))
        {
            return $provider = new ActiveDataProvider([
                'query' => $model,
                'pagination' => [
                    'params' => $request,
                ],
                'sort' => [
                    'params' => $request,
                ],
            ]);
        }

        $errorReasons = $model->getErrors();
        if (empty($errorReasons)) {
            throw new RestHttpException();
        } else {
            $err = '';
            foreach ($errorReasons as $errorReason) {
                $err .= $errorReason[0] . '<br>';
            }
            $err = rtrim($err, '<br>');
            throw new RestHttpException($err, 400);
        }
    }

}
