<?php

declare(strict_types=1);

namespace App\Listens;

use Simps\DB\PDO;
use Simps\DB\Redis;
use Simps\Singleton;

class Pool
{
    use Singleton;

    public function workerStart($server, $workerId)
    {
        $config = config('database', []);
        if (! empty($config)) {
            PDO::getInstance($config);
        }

        $config = config('redis', []);
        if (! empty($config)) {
            Redis::getInstance($config);
        }
    }
}
