<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use \App\WebLink;
use \App\Histori;
use DataTables;

class WeblinkController extends Controller
{
    public function indexSosmed(){
        return view('admin/MiniNavbar/socialmediaAdmin');
    }

    public function indexQuickMenu(){
        return view('admin/MiniNavbar/quickmenuAdmin');
    }

    public function indexLayanan(){
        return view('admin/Footer/layananAdmin');
    }

    public function indexBlog(){
        return view('admin/Footer/blogAdmin');
    }

    public function store(Request $request){
        $history = new Histori;
        $history->nama = auth()->user()->name;
        $history->aksi = "Tambah";
        $history->keterangan = "Menambahkan ".$request->menu." '".$request->nama_web."'";
        $history->save();

        WebLink::create($request->all());

        return response([
            'message' => 'successfully'
        ]);
    }

    public function destroy($id){
        $w = WebLink::find($id);
        $history = new Histori;
        $history->nama = auth()->user()->name;
        $history->aksi = "Hapus";
        $history->keterangan = "Menghapus ".$w->menu." '".$w->nama_web."'";
        $history->save();

        $weblink = WebLink::find($id);
        $weblink->delete();

        return response([
            'message' => 'deleted'
        ]);
    }

    public function update(Request $request, $id){

        $w = WebLink::find($id);
        if($w->nama_web != $request->nama_web){
            $history = new Histori;
            $history->nama = auth()->user()->name;
            $history->aksi = "Edit";
            $history->keterangan = "Mengedit ".$w->menu." '".$w->nama_web."' menjadi '".$request->nama_web."'";
            $history->save();
        }
        if($w->link != $request->link){
            $history = new Histori;
            $history->nama = auth()->user()->name;
            $history->aksi = "Edit";
            $history->keterangan = "Mengedit ".$w->menu." '".$w->link."' menjadi '".$request->link."'";
            $history->save();
        }

        $weblink = WebLink::find($id);
        $weblink->nama_web = $request->nama_web;
        $weblink->link = $request->link;
        $weblink->save();

        return response([
            'message' => 'update successfully'
        ]);
    }

    public function LoadTableWebLink(){
        return view("datatable.TableWeblink");
    }

    public function LoadDataSosmed(){
        $weblink = WebLink::where('menu','=','sosmed')->orderBy('id','desc')->get();

            return Datatables::of($weblink)->addIndexColumn()
            ->addColumn('aksi', function($row){
                $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama_web.'" data-link="'.$row->link.'" data-menu="'.$row->menu.'" class="btn-edit-sosmed" style="font-size: 18pt; text-decoration: none;" class="mr-3">
                <i class="fas fa-pen-square"></i>
                </a>';
                $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama_web.'" class="btn-delete-sosmed" style="font-size: 18pt; text-decoration: none; color:red;">
                <i class="fas fa-trash"></i>
                </a>';
                return $btn;
         })
         ->rawColumns(['aksi'])
            ->make(true);
    }

    public function LoadDataQuickMenu(){
        $weblink = WebLink::where('menu','=','quick-menu')->orderBy('id','desc')->get();

            return Datatables::of($weblink)->addIndexColumn()
            ->addColumn('aksi', function($row){
                $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama_web.'" data-link="'.$row->link.'" data-menu="'.$row->menu.'" class="btn-edit-quick-menu" style="font-size: 18pt; text-decoration: none;" class="mr-3">
                <i class="fas fa-pen-square"></i>
                </a>';
                $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama_web.'" class="btn-delete-quick-menu" style="font-size: 18pt; text-decoration: none; color:red;">
                <i class="fas fa-trash"></i>
                </a>';
                return $btn;
         })
         ->rawColumns(['aksi'])
            ->make(true);
    }

    public function LoadDataLayanan(){
        $weblink = WebLink::where('menu','=','layanan')->orderBy('id','desc')->get();

            return Datatables::of($weblink)->addIndexColumn()
            ->addColumn('aksi', function($row){
                $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama_web.'" data-link="'.$row->link.'" data-menu="'.$row->menu.'" class="btn-edit-layanan" style="font-size: 18pt; text-decoration: none;" class="mr-3">
                <i class="fas fa-pen-square"></i>
                </a>';
                $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama_web.'" class="btn-delete-layanan" style="font-size: 18pt; text-decoration: none; color:red;">
                <i class="fas fa-trash"></i>
                </a>';
                return $btn;
         })
         ->rawColumns(['aksi'])
            ->make(true);
    }

    public function LoadDataBlog(){
        $weblink = WebLink::where('menu','=','blog')->orderBy('id','desc')->get();

            return Datatables::of($weblink)->addIndexColumn()
            ->addColumn('aksi', function($row){
                $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama_web.'" data-link="'.$row->link.'" data-menu="'.$row->menu.'" class="btn-edit-blog" style="font-size: 18pt; text-decoration: none;" class="mr-3">
                <i class="fas fa-pen-square"></i>
                </a>';
                $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama_web.'" class="btn-delete-blog" style="font-size: 18pt; text-decoration: none; color:red;">
                <i class="fas fa-trash"></i>
                </a>';
                return $btn;
         })
         ->rawColumns(['aksi'])
            ->make(true);
    }
}
