<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Histori;

class HistoryController extends Controller
{
    public function index(){
        return view('admin.Histori.histori');
    }
}
