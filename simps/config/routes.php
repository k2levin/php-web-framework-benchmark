<?php

declare(strict_types=1);

return [

    ['GET', '/', '\App\Controller\IndexController@index'],
    ['GET', '/api/healthz', '\App\Controller\IndexController@getHealthz'],
    ['GET', '/api/user/{id}', '\App\Controller\IndexController@getUser'],

];
