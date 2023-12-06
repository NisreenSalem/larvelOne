<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Common;

class ExampleController extends Controller
{
    use Common;

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
    public function showUpload(Request $req)
    {
        return view('upload');
    }


    public function upload(Request $req)
    {
        // $file = $req->image;
        // $file_extension = $file->getClientOriginalExtension();
        // $file_name = date('YmdHi') . '.' . $file_extension;
        // $path = 'assets/images';
        // $req->image->move($path, $file_name);
        // return 'Uploaded';
        // return dd($req->image);
        // return 'UPLOADED SUCESSFULLY';
        $file = $req->image;
        $path = 'assets/images';
        $filename = $this->uploadFile($file, $path);

        return $filename;
    }
}
