<?php

declare (strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class HomeController extends Controller
{
    public function index(): string
    {
        $data = 'OK';

        return $data;
    }

    public function getHealthz(): JsonResponse
    {
        $datas = ['health' => 'OK'];

        return response()->json($datas, 200);
    }

    public function getUser(int $id): JsonResponse
    {
        $datas = User::select('name', 'email')->find($id);

        return response()->json($datas, 200);
    }
}
