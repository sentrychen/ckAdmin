<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2018-01-22 17:23
 */

namespace common\behaviors;

use common\components\notice\NoticeEvent;
use common\models\Message;
use common\models\User;
use Yii;

class NoticeBehavior extends \yii\base\Behavior
{


    public function init()
    {
        parent::init();

    }

    public function events()
    {
        return [
            NoticeEvent::WITHDRAW_SUCESSS => 'noticeUser',
            NoticeEvent::WITHDRAW_FAILD => 'noticeUser',
            NoticeEvent::DEPOSIT_SUCCESS => 'noticeUser',
            NoticeEvent::DEPOSIT_FAILD => 'noticeUser',
            NoticeEvent::CHANGAMOUNT_SUCCESS => 'noticeUser',
            NoticeEvent::SYSTEM_NOTICE => 'noticeUser',
            NoticeEvent::PLATFORM_MESSAGE => 'noticeUser',
            NoticeEvent::WITHDRAW_APPLY => 'noticeAdmin',
            NoticeEvent::DEPOSIT_APPLY => 'noticeAdmin',
            NoticeEvent::CHANGAMOUNT_APPLY => 'noticeAdmin',
        ];
    }

    /**
     * @param $event NoticeEvent
     */
    public function noticeUser($event)
    {
        $uid = $event->uid;
        $topic = $event->name;
        $message = $event->message ? $event->message : $event->getMessage($topic);

        if ($topic != NoticeEvent::SYSTEM_NOTICE && $topic != NoticeEvent::PLATFORM_MESSAGE) {
            Message::sendSysMessageToUser([$uid], '系统消息', $message, Message::LEVEL_MID);
        }

        if ($uid) {
            $user = User::findOne($uid);
            if (!$user || !$user->api_token || !Yii::$app->redis->exists('token:' . $user->api_token)) {
                return;
            }
        }
        $notices = Yii::$app->redis->get('uid:notices:' . $uid);
        if ($notices)
            $notices = json_decode($notices);
        else {
            $notices = [];
        }
        $notices[] = ['topic' => $topic, 'message' => $message];
        Yii::$app->redis->setex('uid:notices:' . $uid, Yii::$app->params['user.noticeExpire'], json_encode($notices));
    }

    /**
     * @param $event NoticeEvent
     */
    public function noticeAdmin($event)
    {
        if (!empty($event->roles)) {
            $uids = [];
            foreach ($event->roles as $role) {
                $uids = array_merge($uids, Yii::$app->authManager->getUserIdsByRole($role));
            }
            $uids = array_keys(array_flip($uids));

            if (!empty($uids)) {
                $topic = $event->name;
                $message = $event->getMessage($topic);

                Message::sendSysMessageToAdmin($uids, '系统消息', $message, Message::LEVEL_MID);
                foreach ($uids as $uid) {
                    $notices = Yii::$app->redis->get('admin:notices:' . $uid);
                    if ($notices)
                        $notices = json_decode($notices);
                    else {
                        $notices = [];
                    }
                    $notices[] = ['topic' => $topic, 'message' => $message];
                    Yii::$app->redis->setex('admin:notices:' . $uid, Yii::$app->params['admin.noticeExpire'], json_encode($notices));
                }
            }

        }
    }
}