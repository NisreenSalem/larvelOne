<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{

    public function getData(Request $req)
    {
        return $req->input();
    }
    public function login()
    {
        return view('login');
    }
    public function recieve(Request $req)
    {
        return $req;
    }
}
