<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2018-01-22 17:17
 */

namespace common\components\notice;

class UserNoticeEvent extends \yii\base\Event
{
    const WITHDRAW_SUCESSS = 'withdraw-success';
    const WITHDRAW_FAILD = 'withdraw-faild';
    const DEPOSIT_SUCCESS = 'deposit-success';
    const DEPOSIT_FAILD = 'deposit-faild';
    const SYSTEM_NOTICE = 'system-notice';
    const PLATFORM_MESSAGE = 'platform-message';
    const CHANGAMOUNT_SUCCESS = 'changeamount-success';

    /** @var int */
    public $uid = 0;
    public $message = '';

    public function getMessage($topic)
    {
        if ($this->message != '') return $this->message;
        $messages = [
            self::WITHDRAW_SUCESSS => '取款申请成功',
            self::DEPOSIT_SUCCESS => '存款申请成功',
            self::WITHDRAW_FAILD => '取款申请失败',
            self::DEPOSIT_FAILD => '存款申请失败',
            self::CHANGAMOUNT_SUCCESS => '上下分成功',
        ];

        return isset($messages[$topic]) ? $messages[$topic] : $topic;
    }

}