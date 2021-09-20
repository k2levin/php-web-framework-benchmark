<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\User;

class IndexController extends AbstractController
{
    public function index()
    {
        $data = 'OK';

        return $data;
    }

    public function getHealthz()
    {
        $datas = ['health' => 'OK'];

        return $this->response->json($datas);
    }

    public function getUser(int $id)
    {
        $datas = User::select('name', 'email')->find($id);

        return $this->response->json($datas);
    }
}
