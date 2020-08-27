<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\StrukturOrganisasiProdi;
use DataTables;
use Illuminate\Support\Facades\Storage;

class StrukturOrganisasiController extends Controller
{
    public function index(){
        return view('admin/Profile/strukturorganisasiAdmin');
    }

    public function store(Request $request){
        if($request->hasFile('gambar')){
            $directory = 'assets/upload/thumbnail';
            $file = request()->file('gambar');
            $nama = time().$file->getClientOriginalName();
            $file->name = $nama;
            $file->move($directory, $file->name);
            $so = new StrukturOrganisasiProdi;
            $so->judul = $request->nama;
            $so->deskripsi = $request->deskripsi;
            $so->gambar= $directory."/".$nama;
            $so->save();

        return response()->json([
            'message' => 'success'
        ]);
        }
    }

    public function update(Request $request, $id){

        if($request->hasFile('gambar')){
            $directory = 'assets/upload/thumbnail';
            $file = request()->file('gambar');
            $nama = time().$file->getClientOriginalName();
            $file->name = $nama;
            $file->move($directory, $file->name);

            $so = StrukturOrganisasiProdi::find($id);
            try {
                unlink($so->gambar);
            } catch (\Throwable $th) {
                echo($th);
            }
            $so->judul = $request->nama;
            $so->deskripsi = $request->deskripsi;
            $so->gambar= $directory."/".$nama;
            $so->save();

            return response([
                'message' => 'update successfully'
            ]);
        }else{
            $so = StrukturOrganisasiProdi::find($id);
            $so->judul = $request->nama;
            $so->deskripsi = $request->deskripsi;
            $so->save();

            return response([
                'message' => 'update successfully'
            ]);
        }
    }

    public function destroy($id){
        $so = StrukturOrganisasiProdi::find($id);
        $so->delete();

        return response([
            'message' => 'delete successfully!'
        ]);
    }

    public function get($id){
        $so = StrukturOrganisasiProdi::find($id);

        return response([
            'data' => $so
        ]);
    }

    public function LoadTableSO(){
        return view('datatable.TableStrukturOganisasi');
    }

    public function LoadDataSO(){
        $so = StrukturOrganisasiProdi::orderBy('id','desc')->get();

            return Datatables::of($so)->addIndexColumn()
            ->addColumn('aksi', function($row){
                $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn-edit-so" style="font-size: 18pt; text-decoration: none;" class="mr-3">
                <i class="fas fa-pen-square"></i>
                </a>';
                $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->judul.'" class="btn-delete-so" style="font-size: 18pt; text-decoration: none; color:red;">
                <i class="fas fa-trash"></i>
                </a>';
                $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->judul.'" class="btn-show-so" style="font-size: 18pt; text-decoration: none; color:green;">
                <i class="fas fa-eye"></i>
                </a>';
                return $btn;
         })
         ->rawColumns(['aksi'])
            ->make(true);
    }

    public function storeImg()
    {
        $directory = 'assets/upload/images';
        $file = request()->file('file');
        $old = $file->getClientOriginalName();
        $nama = time().$file->getClientOriginalName();
        $file->name = $nama;
        $file->move($directory, $file->name);
        return response()->json(['location' => $directory."/".$nama,'alt'=>$old]);

    }
}
