<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\User;

class IndexController
{
    public function index($request, $response)
    {
        $data = 'OK';

        $response->end($data);
    }

    public function getHealthz($request, $response)
    {
        $datas = ['health' => 'OK'];

        $response->header('Content-Type', 'application/json');
        $response->end(json_encode($datas));
    }

    public function getUser($request, $response, $data)
    {
        $datas = (new User)->getUser((int) $data['id']);

        $response->header('Content-Type', 'application/json');
        $response->end(json_encode($datas));
    }
}
