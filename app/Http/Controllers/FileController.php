<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
class FileController extends Controller
{
    public function store()
    {
        $directory = 'assets/upload/file';
        $file = request()->file('file');
        $old = $file->getClientOriginalName();
        $nama = time().$file->getClientOriginalName();
        $file->name = $nama;
        $file->move($directory, $file->name);
        return response()->json(['location' => $directory."/".$nama,'alt'=>$old]);

    }

    public function retrieve(){
        return response()->file('assets/upload/file/'.'1597728219Petemuan 5.pdf');
    }
}
