<?php

namespace App\Http\Controllers\Akademik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Konten;
use DataTables;

class KegiatanAkademikController extends Controller
{

    public function index(){
        return view('admin/Akademik/kegiatanakaAdmin');
    }

    public function store(Request $request){
        $k = new Konten;
        $k->menu = "Kegiatan Akademik";
        $k->judul = $request->judul;
        $k->deskripsi = $request->deskripsi;
        $k->save();

        return response([
            'message' => 'success'
        ]);
    }

    public function destroy($id){
        $a = Konten::find($id);
        $a->delete();

        return response([
            'message' => "delete success"
        ]);
    }

    public function get($id){
        $a = Konten::find($id);

        return response([
            'data' => $a
        ]);
    }

    public function update(Request $request,$id){
        $a = Konten::find($id);
        $a->judul = $request->edit_judul;
        $a->deskripsi = $request->edit_deskripsi;
        $a->Save();

        return response([
            'message' => 'update sukses'
        ]);
    }

    public function LoadTableKA(){
        return view('datatable.TableKegiatanAkademik');
    }

    public function LoadDataKA(){
        $jabatan = Konten::where('menu','Kegiatan Akademik')->orderBy('id','desc')->get();

            return Datatables::of($jabatan)->addIndexColumn()
            ->addColumn('aksi', function($row){
                $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" data-judul="'.$row->judul.'" class="btn-edit-ka" style="font-size: 18pt; text-decoration: none;" class="mr-3">
                <i class="fas fa-pen-square"></i>
                </a>';
                $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-judul="'.$row->judul.'" class="btn-delete-ka" style="font-size: 18pt; text-decoration: none; color:red;">
                <i class="fas fa-trash"></i>
                </a>';
                $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-judul="'.$row->judul.'" class="btn-show-ka" style="font-size: 18pt; text-decoration: none; color:green;">
                <i class="fas fa-eye"></i>
                </a>';
                return $btn;
         })
         ->rawColumns(['aksi'])

         ->make(true);
    }
}
