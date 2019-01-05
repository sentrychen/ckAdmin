<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2018-01-22 17:17
 */

namespace common\components\notice;

class AdminNoticeEvent extends \yii\base\Event
{
    const WITHDRAW_APPLY = 'withdraw-apply';
    const DEPOSIT_APPLY = 'deposit-apply';
    const CHANGAMOUNT_APPLY = 'changeamount-apply';
    const PLATFORM_AMOUNT_BELOW = 'platform-amount-below';

    /** @var int */
    public $message = '';
    public $roles = [];

    public function getMessage($topic)
    {
        if ($this->message != '') return $this->message;
        $messages = [

            self::WITHDRAW_APPLY => '用户申请取款',
            self::DEPOSIT_APPLY => '用户申请存款',
            self::CHANGAMOUNT_APPLY => '上下分申请',
            self::PLATFORM_AMOUNT_BELOW => '平台资金低于告警额度',
        ];

        return isset($messages[$topic]) ? $messages[$topic] : $topic;
    }

}