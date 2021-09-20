<?php

declare(strict_types=1);

use Hyperf\HttpServer\Router\Router;

Router::get('/', 'App\Controller\IndexController@index');
Router::get('/api/healthz', 'App\Controller\IndexController@getHealthz');
Router::get('/api/user/{id}', 'App\Controller\IndexController@getUser');
