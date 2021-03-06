<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

defined('SWOOLE_PROCESS') or define('SWOOLE_PROCESS', 1);
defined('SWOOLE_TCP') or define('SWOOLE_TCP', 1);

return [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'console\controllers',
    'components' => [
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => yii\log\FileTarget::class,//当触发levels配置的错误级别时，保存到日志文件
                    'levels' => ['error', 'warning'],
                    'logVars' => ['*'],
                    'categories' => ['application'],
                ],
                [
                    'class' => yii\log\FileTarget::class,//当触发levels配置的错误级别时，保存到日志文件
                    'levels' => ['error'],
                    'logVars' => ['*'],
                    'categories' => ['task'],
                    'logFile' => '@runtime/logs/task/' . date('Ym') . '/task-' . date('d') . '.log',
                ],
            ],
        ],
        'cache' => [//缓存组件
            'class' => yii\redis\Cache::class,
        ],
        'session' => [
            'class' => yii\web\Session::className()
        ]

    ],
    'controllerMap'=>[
        'serve' => [
            'class' => yii\console\controllers\ServeController::className(),
            'docroot' => '@agent/web',
        ],
        'swoole' => [
            'class' => \feehi\console\SwooleController::className(),
            'rootDir' => str_replace('console/config', '', __DIR__ ),//yii2项目根路径
            'app' => 'agent',//app目录地址
                        'host' => '127.0.0.1',//监听地址
                        'port' => 9999,//监听端口
                        'swooleConfig' => [//标准的swoole配置项都可以再此加入
                'reactor_num' => 2,
                'worker_num' => 4,
                'daemonize' => true,
                            'log_file' => __DIR__ . '/../../agent/runtime/logs/swoole.log',
                'log_level' => 0,
                            'pid_file' => __DIR__ . '/../../agent/runtime/server.pid',
            ],
        ],
        'swoole-backend' => [
        'class' => \feehi\console\SwooleController::className(),
        'rootDir' => str_replace('console/config', '', __DIR__ ),//yii2项目根路径
            'app' => 'backend',
            'host' => '127.0.0.1',
            'port' => 9998,
            'swooleConfig' => [
                'reactor_num' => 2,
                'worker_num' => 4,
                'daemonize' => true,
                'log_file' => __DIR__ . '/../../backend/runtime/logs/swoole.log',
                'log_level' => 0,
                'pid_file' => __DIR__ . '/../../backend/runtime/server.pid',
            ],
        ]
    ],
    'params' => $params,
];
