<?php
/**
 * Author: ty
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2018-11-23 10:00
 */

namespace api\controllers;

use api\models\Platform;
use api\models\PlatformGame;
use common\models\GameType;
use Yii;
use yii\data\ActiveDataProvider;


class GameController extends ActiveController
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['optional'] = ['list'];
        return $behaviors;
    }

    /*
     * 游戏列表
     * @return obj
     *
     */
    public function actionList()
    {

        $query = PlatformGame::find()->joinWith('platform')
            ->where([PlatformGame::tableName() . '.status' => PlatformGame::STATUS_ENABLED, Platform::tableName() . '.status' => Platform::STATUS_ENABLED])
            ->orderBy([Platform::tableName() . '.id' => SORT_ASC, PlatformGame::tableName() . '.id' => SORT_ASC]);
        $request = Yii::$app->getRequest()->getQueryParams();
        return $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'params' => $request,
            ],
            'sort' => [
                'params' => $request,
            ],
        ]);
    }


    /*
     * 游戏类型列表
     * @return obj
     *
     */
    public function actionTypes()
    {

        return GameType::find()->all();
    }
}
