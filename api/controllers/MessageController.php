<?php

namespace api\controllers;

use api\models\MessageFlag;
use common\libs\Constants;
use Yii;
use api\models\Message;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\web\UnprocessableEntityHttpException;
/**
 * MessageController implements the CRUD actions for Message model.
 */
class MessageController extends ActiveController
{
    public $modelClass = "api\models\User";
    public function actions()
    {
        return [];
    }
    /*
     *新消息数量
     */
    public function actionUnread(){
        return MessageFlag::userNoreadCount(Yii::$app->getUser()->getId());
    }

    /*
     * 用户消息列表
     */
    public function actionList()
    {
        $list = Message::find()->joinWith('messageFlag')
            ->where([Message::tableName() . '.user_type' => Message::OBJ_MEMBER, Message::tableName() . '.is_deleted' => Constants::YesNo_No])
            ->andWhere(['or', [MessageFlag::tableName() . '.is_deleted' => Constants::YesNo_No],
                ['notify_obj' => Message::SEND_ALL, MessageFlag::tableName() . '.id' => null]])->all();

        return $list;
    }

    /*
     * 用户消息详情
     */
    public function actionInfo()
    {
        //$user = Yii::$app->getUser()->getIdentity();
        $request = Yii::$app->request;
        $id = $request->get('id');
        $result = Message::find()
            ->joinWith('messageFlag')
            ->where([Message::tableName().'.id' => $id])
            ->all();
        return $result;
    }
    /*
     * 删除用户消息
     * @return bool
     * */
    public function actionRemove()
    {
        $user = Yii::$app->getUser()->getIdentity();
        $request = Yii::$app->request;
        $id = $request->get('id');
        $res = MessageFlag::deleteUserMessage($id);
        return $res;
    }
}
