<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $param = '';

        return response([
            [
                'id' => 1,
            ],
            ['id' => 2]
        ]);
    }
}
