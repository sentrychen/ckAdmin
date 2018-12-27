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
    const DEPOSIT_SUCCESS = 'deposit-success';
    const DEPOSIT_FAILD = 'deposit-faild';
    const SYSTEM_NOTICE = 'system-notice';
    const PLATFORM_MESSAGE = 'platform-message';

    /** @var int */
    public $uid = 0;
    public $message = '';

    public function getMessage($topic)
    {
        $messages = [
            'withdraw-success' => '取款申请成功',
            'deposit-success' => '存款申请成功',
            'withdraw-faild' => '取款申请失败',
            'deposit-faild' => '存款申请失败'
        ];

        return isset($messages[$topic]) ? $messages[$topic] : $this->message;
    }

}