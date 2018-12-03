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
use yii\data\ActiveDataProvider;
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
        $startDate = isset($request['startDate'])?$request['startDate']:'';
        $endDate = isset($request['endDate'])?$request['endDate']:'';
        $condition = ['user_id' => $user->getId()];

        $model = $bet_list::find()->where($condition);
        if(!empty($startDate)) {
            $startTime = strtotime($startDate.' 00:00:00');
            $endTime = $endDate?strtotime($endDate.' 23:59:59'):strtotime($startDate.' 23:59:59');
            $model->andFilterWhere(['between', 'bet_at',$startTime,$endTime]);
        }
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
