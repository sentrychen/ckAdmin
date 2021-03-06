<?php

namespace api\controllers;

use api\components\RestHttpException;
use api\models\Message;
use api\models\MessageFlag;
use common\libs\Constants;
use Yii;
use yii\data\ActiveDataProvider;

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
        //return MessageFlag::userNoreadCount(Yii::$app->getUser()->getId());
        return Message::getUnreadCount();
    }

    /*
     * 用户消息列表
     */
    public function actionList()
    {
        $model = Message::find()->joinWith('messageFlag')
            ->where([Message::tableName() . '.user_type' => Message::OBJ_MEMBER,
                Message::tableName() . '.is_deleted' => Constants::YesNo_No,
                //MessageFlag::tableName() . '.user_id' => yii::$app->getUser()->getId()
            ])
            ->andWhere(['or', [MessageFlag::tableName() . '.is_deleted' => Constants::YesNo_No],
                ['notify_obj' => Message::SEND_ALL, MessageFlag::tableName() . '.id' => null]]);
        $request = Yii::$app->getRequest()->getQueryParams();

        if (!empty($request)) {
            return $provider = new ActiveDataProvider([
                'query' => $model,
                'pagination' => [
                    'params' => $request,
                ],
                'sort' => [
                    'params' => $request,
                    'defaultOrder' => [
                        'created_at' => SORT_DESC,
                    ],
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
        $messageFlag = $result->messageFlag ?? false;
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
        $id = $request->post('id');
        $result = Message::findOne($id);

        if (!$request)
            throw new RestHttpException("错误的消息ID", 400);

        if ($result->user_type != Message::OBJ_MEMBER) {
            throw new RestHttpException("错误的消息ID", 400);
        }
        $messageFlag = $result->messageFlag ?? false;
        if (!$messageFlag) {
            if ($result->notify_obj != Message::SEND_ALL) {
                throw new RestHttpException("错误的消息ID", 400);
            }
            $messageFlag = new MessageFlag(['message_id' => $id, 'user_id' => yii::$app->getUser()->getId(), 'user_type' => Message::OBJ_MEMBER]);
        } else {
            if ($messageFlag->is_deleted == Constants::YesNo_Yes) {
                throw new RestHttpException("消息已经被删除", 400);
            }
        }

        $messageFlag->is_deleted = Constants::YesNo_Yes;
        $messageFlag->deleted_at = time();
        $messageFlag->save(false);

        return $result;
    }

    /*
     * 未读消息
     *
     */
    public function actionNoread()
    {


        return Message::getUnreadCount();

        /*
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
        */
    }
}
