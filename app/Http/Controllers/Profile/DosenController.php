<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Dosen;
use DataTables;

class DosenController extends Controller
{
    public function index(){

      return view('admin/Profile/dosendantenagakerja');

    }

    public function store(Request $request){
        if($request->hasFile('gambar')){
            $directory = 'assets/upload/dosen';
            $file = request()->file('gambar');
            $nama = time().$file->getClientOriginalName();
            $file->name = $nama;
            $file->move($directory, $file->name);

            $dosen = new Dosen;
            $dosen->nama = $request->nama;
            $dosen->deskripsi = $request->deskripsi;
            $dosen->gambar= $directory."/".$nama;
            $dosen->save();

            return response()->json([
                'message' => 'success'
            ]);
        }
    }

    public function update(Request $request, $id){
        if($request->hasFile('gambar')){
            $directory = 'assets/upload/dosen';
            $file = request()->file('gambar');
            $nama = time().$file->getClientOriginalName();
            $file->name = $nama;
            $file->move($directory, $file->name);

            $dosen = Dosen::find($id);
            $dosen->nama = $request->nama;
            $dosen->deskripsi = $request->deskripsi;
            $dosen->gambar= $directory."/".$nama;
            $dosen->save();

            return response()->json([
                'message' => 'success'
            ]);
        }else{
            $dosen = Dosen::find($id);
            $dosen->nama = $request->nama;
            $dosen->deskripsi = $request->deskripsi;
            $dosen->save();

            return response()->json([
                'message' => 'success'
            ]);
        }
    }

    public function destroy($id){
        $d = Dosen::find($id);
        $d->delete();

        return response([
            'message' => "delete dosen sukses"
        ]);
    }

    public function get($id){
        $dosen = Dosen::find($id);
        return response([
            'data' => $dosen
        ]);
    }

    public function LoadTableDosen(){
        return view('datatable.TableDosen');
    }

    public function LoadDataDosen(){
        $so = Dosen::orderBy('id','desc')->get();

            return Datatables::of($so)->addIndexColumn()
            ->addColumn('aksi', function($row){
                $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn-edit-dosen" style="font-size: 18pt; text-decoration: none;" class="mr-3">
                <i class="fas fa-pen-square"></i>
                </a>';
                $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama.'" class="btn-delete-dosen" style="font-size: 18pt; text-decoration: none; color:red;">
                <i class="fas fa-trash"></i>
                </a>';
                $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama.'" class="btn-show-dosen" style="font-size: 18pt; text-decoration: none; color:green;">
                <i class="fas fa-eye"></i>
                </a>';
                return $btn;
         })
         ->rawColumns(['aksi'])
            ->make(true);
    }
}
