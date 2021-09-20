<?php declare(strict_types=1);

use Swoft\Db\Database;
use Swoft\Db\Pool;
use Swoft\Http\Server\HttpServer;
use Swoft\Http\Server\Swoole\RequestListener;
use Swoft\Redis\RedisDb;
use Swoft\Rpc\Client\Client as ServiceClient;
use Swoft\Rpc\Client\Pool as ServicePool;
use Swoft\Rpc\Server\ServiceServer;
use Swoft\Server\SwooleEvent;
use Swoft\Task\Swoole\FinishListener;
use Swoft\Task\Swoole\TaskListener;
use Swoft\WebSocket\Server\WebSocketServer;

return [
    'noticeHandler'      => [
        'logFile' => '@runtime/logs/notice-%d{Y-m-d-H}.log',
    ],

    'applicationHandler' => [
        'logFile' => '@runtime/logs/error-%d{Y-m-d}.log',
    ],

    'logger'             => [
        'flushRequest' => false,
        'enable'       => false,
        'json'         => false,
    ],

    'httpServer'         => [
        'class'    => HttpServer::class,
        'port'     => (int) env('SERVER_HTTP_PORT', 18306),
        'listener' => [
            // 'rpc' => bean('rpcServer'),
            // 'tcp' => bean('tcpServer'),
        ],
        'process'  => [
            // 'monitor' => bean(\App\Process\MonitorProcess::class)
            // 'crontab' => bean(CrontabProcess::class)
        ],
        'on'       => [
            // SwooleEvent::TASK   => bean(SyncTaskListener::class),  // Enable sync task
            SwooleEvent::TASK   => bean(TaskListener::class),  // Enable task must task and finish event
            SwooleEvent::FINISH => bean(FinishListener::class)
        ],
        /* @see HttpServer::$setting */
        'setting'  => [
            'task_worker_num'       => swoole_cpu_num(),
            'task_enable_coroutine' => true,
            'worker_num'            => swoole_cpu_num(),
            // static handle
            // 'enable_static_handler'    => true,
            // 'document_root'            => dirname(__DIR__) . '/public',
        ]
    ],

    'db'                 => [
        'class'    => Database::class,
        'dsn'      => 'mysql:dbname='.env('DB_DATABASE', 'test').';host='.env('DB_HOST', '127.0.0.1'),
        'username' => env('DB_USERNAME', 'root'),
        'password' => env('DB_PASSWORD', ''),
        'charset'  => 'utf8mb4',
    ],

    'redis'              => [
        'class'    => RedisDb::class,
        'host'     => '127.0.0.1',
        'port'     => 6379,
        'database' => 0,
        'option'   => [
            'prefix' => 'swoft:'
        ]
    ],
];
