<?php
return [
    'supportEmail' => 'admin@feehi.com',
    'user.passwordResetTokenExpire' => 3600,
    'user.apiTokenExpire' => 7 * 24 * 3600, //token 有效期为7天
    'user.noticeExpire' => 36000, //消息 有效期为30秒
    'admin.noticeExpire' => 30, //消息 有效期为30秒
    'site' => [
        'url' => 'http://www.onetop.pw',
        'sign' => '###~SITEURL~###',//数据库中保存的本站地址，展示时替换成正确url
    ],
    'admin' => [
        'url' => 'http://admin.onetop.pw/admin',
    ],
    'moneyChart' => '¥',
];
