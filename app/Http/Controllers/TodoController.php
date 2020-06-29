<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        //お試し用
        $data = array(['name' => 'test', 'detail' => '１つ目', 'limit' => '2020-01-01', 'status' => 'complete'],
            ['name' => 'test', 'detail' => '２つ目', 'limit' => '2020-01-01', 'status' => 'complete'],
            ['name' => 'test', 'detail' => '３つ目', 'limit' => '2020-01-01', 'status' => 'complete']
        );

        return view('todo.index', ['data' => $data]);
    }
}
