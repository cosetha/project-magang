<?php

namespace App\Http\Controllers\Akademik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Konten;
use DataTables;

class TugasAkhirController extends Controller
{
    public function index(){
        return view('admin/Akademik/tugasakhirAdmin');
    }

    public function store(Request $request){
        $k = new Konten;
        $k->menu = "Tugas Akhir";
        $k->judul = $request->judul;
        $k->deskripsi = $request->deskripsi;
        $k->save();

        return response([
            'message' => 'sukses'
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

    public function LoadTableTA(){
        return view('datatable.TableTugasAkhir');
    }

    public function LoadDataTA(){
        $jabatan = Konten::where('menu','Tugas Akhir')->orderBy('id','desc')->get();

            return Datatables::of($jabatan)->addIndexColumn()
            ->addColumn('aksi', function($row){
                $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" data-judul="'.$row->judul.'" class="btn-edit-ta" style="font-size: 18pt; text-decoration: none;" class="mr-3">
                <i class="fas fa-pen-square"></i>
                </a>';
                $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-judul="'.$row->judul.'" class="btn-delete-ta" style="font-size: 18pt; text-decoration: none; color:red;">
                <i class="fas fa-trash"></i>
                </a>';
                $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-judul="'.$row->judul.'" class="btn-show-ta" style="font-size: 18pt; text-decoration: none; color:green;">
                <i class="fas fa-eye"></i>
                </a>';
                return $btn;
         })
         ->rawColumns(['aksi'])
            ->make(true);
    }
}
