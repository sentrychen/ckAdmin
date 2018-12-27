<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2018-01-22 17:23
 */

namespace common\behaviors;

use common\components\notice\NoticeEvent;
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
            NoticeEvent::WITHDRAW_SUCESSS => 'sendNotice',
            NoticeEvent::WITHDRAW_FAILD => 'sendNotice',
            NoticeEvent::DEPOSIT_SUCCESS => 'sendNotice',
            NoticeEvent::DEPOSIT_FAILD => 'sendNotice',
            NoticeEvent::SYSTEM_NOTICE => 'sendNotice',
            NoticeEvent::PLATFORM_MESSAGE => 'sendNotice',
        ];
    }

    /**
     * @param $event NoticeEvent
     */
    public function sendNotice($event)
    {
        $uid = $event->uid;
        $topic = $event->name;
        $message = $event->getMessage($topic);

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

}