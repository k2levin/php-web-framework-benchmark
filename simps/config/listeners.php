<?php

declare(strict_types=1);

return [

    //Server::onStart
    'start' => [
        //
    ],

    //Server::onWorkerStart
    'workerStart' => [
        [\App\Listens\Pool::class, 'workerStart'],
    ],

];
