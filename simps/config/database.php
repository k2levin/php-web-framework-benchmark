<?php

declare(strict_types=1);

use function App\env;

return [
    'host' => env('DB_HOST', 'localhost'),
    'port' => (int) env('DB_PORT', 3306),
    'database' => env('DB_DATABASE', 'simps'),
    'username' => env('DB_USERNAME', 'root'),
    'password' => env('DB_PASSWORD', ''),
    'charset' => 'utf8mb4',
    'options' => [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ],
    'size' => 64,
];
