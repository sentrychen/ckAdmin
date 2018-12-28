<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2018-01-22 17:17
 */

namespace common\components\notice;

class NoticeEvent extends \yii\base\Event
{
    const WITHDRAW_SUCESSS = 'withdraw-success';
    const WITHDRAW_FAILD = 'withdraw-faild';
    const WITHDRAW_APPLY = 'withdraw-apply';
    const DEPOSIT_SUCCESS = 'deposit-success';
    const DEPOSIT_FAILD = 'deposit-faild';
    const DEPOSIT_APPLY = 'deposit-apply';
    const SYSTEM_NOTICE = 'system-notice';
    const PLATFORM_MESSAGE = 'platform-message';
    const CHANGAMOUNT_APPLY = 'changeamount-apply';
    const CHANGAMOUNT_SUCCESS = 'changeamount-success';

    /** @var int */
    public $uid = 0;
    public $message = '';
    public $roles = [];

    public function getMessage($topic)
    {
        if ($this->message != '') return $this->message;
        $messages = [
            self::WITHDRAW_SUCESSS => '取款申请成功',
            self::DEPOSIT_SUCCESS => '存款申请成功',
            self::WITHDRAW_FAILD => '取款申请失败',
            self::DEPOSIT_FAILD => '存款申请失败',
            self::WITHDRAW_APPLY => '用户申请取款',
            self::DEPOSIT_APPLY => '用户申请存款',
            self::CHANGAMOUNT_APPLY => '上下分申请',
            self::CHANGAMOUNT_SUCCESS => '上下分成功',
        ];

        return isset($messages[$topic]) ? $messages[$topic] : $topic;
    }

}