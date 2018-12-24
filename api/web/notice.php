<?php
header('Content-Type:application/json; charset=utf-8');

$data = ['code' => 0, 'data' => [
    ['topic' => 'withdraw-success', 'message' => '取款申请成功'],
    ['topic' => 'deposit-success', 'message' => '存款申请成功'],
    ['topic' => 'withdraw-faild', 'message' => '取款申请失败'],
    ['topic' => 'deposit-faild', 'message' => '存款申请失败'],
    ['topic' => 'system-notice', 'message' => '晚上8点系统维护'],
    ['topic' => 'platform-message', 'message' => '平台消息'],
]];

if (rand(0, 5) == 1)
    exit(json_encode($data, JSON_UNESCAPED_UNICODE));
else
    exit(json_encode(['code' => 0, 'data' => []], JSON_UNESCAPED_UNICODE));