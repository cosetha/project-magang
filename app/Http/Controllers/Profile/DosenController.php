<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Dosen;
use \App\Histori;
use File;
use DataTables;
use App\Exports\DosenExport;
use App\Imports\DosenImport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Validator;

class DosenController extends Controller
{
    public function index(){

      return view('admin/Profile/dosendantenagakerja');

    }

    public function store(Request $request){

        $messages = array(
            'nama.required' => 'Kolom nama tidak boleh kosong!',
            'deskripsi.required' => 'Kolom deskripsi tidak boleh kosong!',
            'gambar.required' => 'Harap masukkan gambar!',
            'gambar.mimes' => 'Field Gambar Perlu di Isi dengan Format: jpeg,jpg,png'
        );

        $validator = Validator::make($request->all(),[
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'gambar' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
        ],$messages);

        if($validator->fails()){
            $error = $validator->errors()->first();
                return response()->json([
                    'error' => $error,
                ]);
        }

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

            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Tambah";
                    $history->keterangan = "Menambahkan Dosen '".$request->nama."'";
                    $history->save();

            return response()->json([
                'message' => 'success'
            ]);
        }
    }

    public function update(Request $request, $id){
        if($request->hasFile('gambar')){

            $messages = array(
                'nama.required' => 'Kolom nama tidak boleh kosong!',
                'deskripsi.required' => 'Kolom deskripsi tidak boleh kosong!',
                'gambar.required' => 'Harap masukkan gambar!',
                'gambar.mimes' => 'Field Gambar Perlu di Isi dengan Format: jpeg,jpg,png'
            );

            $validator = Validator::make($request->all(),[
                'nama' => 'required|string',
                'deskripsi' => 'required|string',
                'gambar' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
            ],$messages);

            if($validator->fails()){
                $error = $validator->errors()->first();
                    return response()->json([
                        'error' => $error,
                    ]);
            }

            $directory = 'assets/upload/dosen';
            $file = request()->file('gambar');
            $nama = time().$file->getClientOriginalName();
            $file->name = $nama;
            $file->move($directory, $file->name);

            $dosen = Dosen::find($id);
            if($dosen->nama != $request->nama){
                $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Dosen '".$dosen->nama."' menjadi '".$request->nama."'";
                    $history->save();
            }
            if($dosen->deskripsi != $request->deskripsi){
                $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Deskripsi Dosen '".$dosen->nama."'";
                    $history->save();
            }
            if($dosen->gambar != $directory."/".$nama){
                $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Gambar Dosen '".$dosen->nama."'";
                    $history->save();
            }

            unlink($dosen->gambar);

            $dosen->nama = $request->nama;
            $dosen->deskripsi = $request->deskripsi;
            $dosen->gambar= $directory."/".$nama;
            $dosen->save();

            return response()->json([
                'message' => 'success'
            ]);
        }else{
            $messages = array(
                'nama.required' => 'Kolom nama tidak boleh kosong!',
                'deskripsi.required' => 'Kolom deskripsi tidak boleh kosong!',
            );

            $validator = Validator::make($request->all(),[
                'nama' => 'required|string',
                'deskripsi' => 'required|string',
            ],$messages);

            if($validator->fails()){
                $error = $validator->errors()->first();
                    return response()->json([
                        'error' => $error,
                    ]);
            }

            $dosen = Dosen::find($id);
            if($dosen->nama != $request->nama){
                $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Dosen '".$dosen->nama."' menjadi '".$request->nama."'";
                    $history->save();
            }
            if($dosen->deskripsi != $request->deskripsi){
                $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Deskripsi Dosen '".$dosen->nama."'";
                    $history->save();
            }
            $dosen->nama = $request->nama;
            $dosen->deskripsi = $request->deskripsi;
            $dosen->save();

            return response()->json([
                'message' => 'success'
            ]);
        }
    }

    public function destroy($id){
        $pathDelete = Dosen::where('id', $id)->value('gambar');
        File::delete($pathDelete);

        $d = Dosen::find($id);
        $history = new Histori;
        $history->nama = auth()->user()->name;
        $history->aksi = "Hapus";
        $history->keterangan = "Menghapus Dosen '".$d->nama."'";
        $history->save();
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

    public function export_excel(){
        return Excel::download(new DosenExport, 'dosen.xlsx');
    }

    public function export_pdf(){
        $dosen = Dosen::all();
        $pdf = PDF::loadview('PDF/Dosen_pdf',['dosen'=>$dosen]);
	    return $pdf->download('laporan-dosen.pdf');
    }

    public function download_format(){

        return response()->download('EXCEL/dosen/example-dosen-format.xlsx');
    }

    public function import_excel(Request $request){

		$file = $request->file('file');

        $history = new Histori;
        $history->nama = auth()->user()->name;
        $history->aksi = "Tambah";
        $history->keterangan = "Mengimport file Dosen";
        $history->save();

		// import data
		Excel::import(new DosenImport, $file);

		return response([
            'message' => "import dosen excel sukses"
        ]);
    }
}
