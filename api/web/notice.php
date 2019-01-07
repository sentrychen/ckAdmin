<?php
header('Content-Type:application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *"); // 允许任意域名发起的跨域请求
header("Access-Control-Allow-Headers: Origin,X-Requested-With,Content-Type,Accept,No-Cache,If-Modified-Since,Last-Modified,Cache-Control,Expires,X-E4M-With");
header("Access-Control-Request-Headers: *");

$params = require __DIR__ . '/../../common/config/params.php';

$token = $_GET['token'] ?? '';

if (!preg_match('/^[A-Za-z0-9_-]{32}_\d{10}$/', $token, $matches)) {
    exitCode(1);
}

$timestamp = (int)substr($token, -10);
$expire = $params['user.apiTokenExpire'] ?? 3600;
if ($timestamp + $expire < time()) {
    exitCode(2);
}


try {
    $config = require __DIR__ . '/../../common/config/main-local.php';
    $config = $config['components']['redis'];

    $redis = new Redis();
    $timeout = $config['dataTimeout'] ?? 2;
    $redis->connect($config['hostname'], $config['port'], $timeout);

    if (isset($config['password'])) {
        $redis->auth($config['password']);
    }
    if (isset($config['database'])) {
        $redis->select($config['database']);
    }

    $uid = $redis->get('token:' . $token);
    if (false === $uid) {
        exitCode(0, [['topic' => 'login-other-client', 'message' => '账号在别的地方登录']]);
    }

    $notices = $redis->get('uid:notices:' . $uid);
    if ($notices)
        $notices = json_decode($notices);
    else {
        $notices = [];
    }
    $sys_notices = $redis->get('uid:notices:0');
    if ($sys_notices)
        $notices[] = json_decode($sys_notices);
    $redis->setex('uid:notices:' . $uid, $params['user.noticeExpire'], '');
    $redis->close();
    exitCode(0, $notices);
} catch (Exception $e) {
    exitCode(3);
}

function exitCode($code, $data = [])
{
    exit(json_encode(['code' => $code, 'data' => $data], JSON_UNESCAPED_UNICODE));
}