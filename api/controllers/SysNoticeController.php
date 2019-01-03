<?php

namespace api\controllers;

use api\models\Notice;
use common\libs\Constants;
use Yii;
use yii\data\ActiveDataProvider;

/**
 * SysNoticeController implements the CRUD actions for Message model.
 */
class SysNoticeController extends ActiveController
{
    public $modelClass = "api\models\Notice";

    /*
     * 用户消息列表
     */
    public function actionList()
    {

        $model = Notice::find()->where(['is_deleted' => Constants::YesNo_No, 'is_cancled' => Constants::YesNo_No, 'user_type' => [0, Notice::OBJ_MEMBER]])
            ->andWhere(['>', 'expire_at', time()])
            ->orderBy('id');
        $request = Yii::$app->getRequest()->getQueryParams();
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


}
