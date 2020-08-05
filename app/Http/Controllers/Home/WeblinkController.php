<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use \App\WebLink;
use DataTables;

class WeblinkController extends Controller
{
    public function index(){
        return view('admin/MiniNavbar/socialmediaAdmin');
    }

    public function store(Request $request){
        WebLink::create($request->all());

        return response([
            'message' => 'successfully'
        ]);
    }

    public function destroy($id){
        $weblink = WebLink::find($id);
        $weblink->delete();

        return response([
            'message' => 'deleted'
        ]);
    }

    public function update(Request $request, $id){
        $weblink = WebLink::find($id);
        $weblink->nama_web = $request->nama_web;
        $weblink->link = $request->link;
        $weblink->menu = $request->menu;
        $weblink->save();

        return response([
            'message' => 'update successfully'
        ]);
    }

    public function LoadTableSosmed(){
        return view("datatable.TableWeblink");
    }

    public function LoadDataSosmed(){
        $weblink = WebLink::orderBy('id','desc')->get();

            return Datatables::of($weblink)->addIndexColumn()
            ->addColumn('aksi', function($row){
                $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama_web.'" data-link="'.$row->link.'" data-menu="'.$row->menu.'" class="btn-edit-weblink" style="font-size: 18pt; text-decoration: none;" class="mr-3">
                <i class="fas fa-pen-square"></i>
                </a>';
                $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama_web.'" class="btn-delete-weblink" style="font-size: 18pt; text-decoration: none; color:red;">
                <i class="fas fa-trash"></i>
                </a>';
                return $btn;
         })
         ->rawColumns(['aksi'])
            ->make(true);
    }
}
