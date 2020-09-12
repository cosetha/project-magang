<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Histori;
use \App\User;
use DataTables;
use Carbon\Carbon;

class HistoryController extends Controller
{
    public function index(){
        return view('admin.Histori.histori');
    }

    public function LoadTableHistory(){
        return view('datatable.TableHistory');
    }

    public function LoadDataHistory(){
        $history = Histori::orderBy('id','desc')->get();

            return Datatables::of($history)->addIndexColumn()->make(true);
    }

    public function TodayHistory(){
        $data = Histori::whereDate('created_at', Carbon::today())->orderBy('id','desc')->get();
        $user = auth()->user()->name;

        return response([
            'data' => $data,
            'user' => $user
        ]);
    }

    public function HistoryClicked($id){
        $h = Histori::find($id);
        $h->status = "clicked";
        $h->save();

        return response([
            'message' => 'clicked'
        ]);
    }

    public function CountTodayHistory(){
        $data = Histori::where('status',null)->whereDate('created_at', Carbon::today())->orderBy('id','desc')->get();
        $total = count($data);

        return response([
            'total' => $total,
        ]);
    }
}
