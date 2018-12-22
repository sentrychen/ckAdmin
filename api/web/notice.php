<?php
header('Content-Type:application/json; charset=utf-8');


$data = ['count' => 3, 'topics' => [
    ['topic' => 'withdraw-success', 'message' => '取款申请成功'],
    ['topic' => 'system-notice', 'message' => '晚上8点系统维护'],
    ['topic' => 'platform-message', 'message' => '你被封号了'],
]];

exit(json_encode($data));