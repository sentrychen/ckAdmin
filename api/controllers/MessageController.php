<?php

namespace api\controllers;

use api\models\Message;
use api\models\MessageFlag;
use common\libs\Constants;
use yii\data\ActiveDataProvider;
use Yii;

/**
 * MessageController implements the CRUD actions for Message model.
 */
class MessageController extends ActiveController
{
    public $modelClass = "api\models\User";



    /*
     *新消息数量
     */
    public function actionUnread()
    {
        return MessageFlag::userNoreadCount(Yii::$app->getUser()->getId());
    }

    /*
     * 用户消息列表
     */
    public function actionList()
    {
        $model = Message::find()->joinWith('messageFlag')
            ->where([Message::tableName() . '.user_type' => Message::OBJ_MEMBER, Message::tableName() . '.is_deleted' => Constants::YesNo_No])
            ->andWhere(['or', [MessageFlag::tableName() . '.is_deleted' => Constants::YesNo_No],
                ['notify_obj' => Message::SEND_ALL, MessageFlag::tableName() . '.id' => null]]);
        $request = Yii::$app->getRequest()->getQueryParams();
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

    /*
     * 用户消息详情
     */
    public function actionInfo()
    {
        //$user = Yii::$app->getUser()->getIdentity();
        $request = Yii::$app->request;
        $id = $request->get('id');
        $result = Message::findOne($id);
        $messageFlag = $result->messageFlag;
        if (!$messageFlag)
            $messageFlag = new MessageFlag(['message_id' => $id, 'user_id' => yii::$app->getUser()->getId(), 'user_type' => Message::OBJ_MEMBER]);

        $messageFlag->is_read = 1;
        $messageFlag->read_at = time();
        $messageFlag->save(false);

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
        $result = Message::findOne($id);
        $messageFlag = $result->messageFlag;
        if (!$messageFlag)
            $messageFlag = new MessageFlag(['message_id' => $id, 'user_id' => yii::$app->getUser()->getId(), 'user_type' => Message::OBJ_MEMBER]);

        $messageFlag->is_deleted = 1;
        $messageFlag->deleted_at = time();
        $messageFlag->save(false);

        return $result;
    }
}
