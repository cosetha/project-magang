<?php

namespace App\Http\Controllers\Akademik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Akreditasi;
use App\Histori;
use File;
use DataTables;
use Validator;

class AkreditasiController extends Controller
{
    public function index()
    {   $nilai = array(
        array('value' => 'A','alt' =>'A'),
        array('value' => 'B','alt' =>'B'),
        array('value' => 'C','alt' =>'C'),
        array('value' => 'Belum Terakreditasi','alt'=>'Belum Terakreditasi'));
        return view('admin.Akademik/akreditasiAdmin',['data'=>$nilai]);
    }

    public function store(Request $request)
    {
        $messages = array(
            'file.mimes' => 'File akreditasi Perlu di Isi dengan Format: jpeg,jpg,png',
            'file.max' => 'Ukuran File Maksimal 8 MB'
        );
        $validator = Validator::make($request->all(),[
            "file" => 'required|mimes:jpeg,jpg,png|max:8192',
            'nilai' => 'required',
            "tanggal_mulai" => 'required',
        	"tanggal_selesai" => 'required'], $messages);
        if($validator->fails()){
            $error = $validator->errors()->first();
                return response()->json([
                    'error' => $error,
                ]);
         }else{
            try {
                $directory = 'assets/upload/akreditasi';
                $file = request()->file('file');
                $nama = time().$file->getClientOriginalName();
                $file->name = $nama;
                $file->move($directory, $file->name);

                $akreditasi = new Akreditasi;
                $akreditasi->file = $directory."/".$nama;
                $akreditasi->nilai = $request->nilai;
                $akreditasi->status = "nonaktif";
                $akreditasi->tanggal_mulai = $request->tanggal_mulai;
                $akreditasi->tanggal_selesai = $request->tanggal_selesai;
                $akreditasi->save();

                $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Tambah";
                    $history->keterangan = "Menambahkan Akreditrasi Tahun '".$request->tanggal_mulai." - ".$request->tanggal_selesai."'";
                    $history->save();

                return response()->json([
                    'message' => 'Success'
                ]);
            } catch (\Exception $e) {

                return response()->json([
                    'error' => $e->getMessage()
                ]);
            }

         }
    }

    public function edit($id)
    {
        $data = Akreditasi::find($id);
        if($data !=null){
            return response()->json([
                "message" => "Succes",
                "values" => $data,
            ]);
        }
        else{
            return response()->json([
                "error" => "Empty"
            ]);
            return response($res);
        }
    }

    public function update(Request $request, $id)
    {
    	$akreditasi = Akreditasi::find($id);
        $messages = array(
            'file.mimes' => 'File akreditasi Perlu di Isi dengan Format: jpeg,jpg,png',
            'file.max' => 'Ukuran File Maksimal 8 MB'
        );
        $validator = Validator::make($request->all(),[
            "file" => 'required|mimes:jpeg,jpg,png|max:8192',
            'nilai' => 'required',
            "tanggal_mulai" => 'required',
            "tanggal_selesai" => 'required'], $messages);
        if($validator->fails()){
            $error = $validator->errors()->first();
                return response()->json([
                    'error' => $error,
                ]);
         }else{
            try {
                if($request->hasFile('file')){

                    $directory = 'assets/upload/akreditasi';
                    $file = request()->file('file');
                    $nama = time().$file->getClientOriginalName();
                    $file->name = $nama;
                    $file->move($directory, $file->name);

                    $akreditasi = Akreditasi::find($id);
                    if($akreditasi->nilai != $request->nilai){
                        $history = new Histori;
                        $history->nama = auth()->user()->name;
                        $history->aksi = "Edit";
                        $history->keterangan = "Mengedit Nilai Akreditrasi Tahun '".$request->tanggal_mulai." - ".$request->tanggal_selesai."'";
                        $history->save();
                    }
                    if($akreditasi->tanggal_mulai != $request->tanggal_mulai){
                        $history = new Histori;
                        $history->nama = auth()->user()->name;
                        $history->aksi = "Edit";
                        $history->keterangan = "Mengedit Tanggal Mulai Akreditasi Tahun '".$request->tanggal_mulai." - ".$request->tanggal_selesai."'";
                        $history->save();
                    }
                    if($akreditasi->tanggal_selesai != $request->tanggal_selesai){
                        $history = new Histori;
                        $history->nama = auth()->user()->name;
                        $history->aksi = "Edit";
                        $history->keterangan = "Mengedit Tanggal Selesai Akreditasi Tahun '".$request->tanggal_mulai." - ".$request->tanggal_selesai."'";
                        $history->save();
                    }
                    if($akreditasi->file != $directory."/".$nama){
                        $history = new Histori;
                        $history->nama = auth()->user()->name;
                        $history->aksi = "Edit";
                        $history->keterangan = "Mengedit Serifikat Akreditasi Tahun '".$request->tanggal_mulai." - ".$request->tanggal_selesai."'";
                        $history->save();
                    }

                    unlink($akreditasi->file);

	                $akreditasi->file = $directory."/".$nama;
	                $akreditasi->nilai = $request->nilai;
	                $akreditasi->tanggal_mulai=$request->tanggal_mulai;
	                $akreditasi->tanggal_selesai=$request->tanggal_selesai;
	                $akreditasi->save();
                }else{
	                $akreditasi = Akreditasi::find($id);
	                $akreditasi->nilai = $request->nilai;
	                $akreditasi->tanggal_mulai=$request->tanggal_mulai;
	                $akreditasi->tanggal_selesai=$request->tanggal_selesai;
	                $akreditasi->save();
                }

            } catch (\Exception $e) {

                return response()->json([
                    'error' => $e->getMessage()
                ]);
            }

         }
    }

    public function destroy($id)
    {
        try {
            $fileDelete = Akreditasi::where('id', $id)->value('file');
            File::delete($fileDelete);

            $akreditasi = Akreditasi::find($id);
            $history = new Histori;
                        $history->nama = auth()->user()->name;
                        $history->aksi = "Hapus";
                        $history->keterangan = "Menghapus Akreditasi Tahun '".$akreditasi->tanggal_mulai." - ".$akreditasi->tanggal_selesai."'";
                        $history->save();
            $akreditasi->delete();
            return response()->json([
                "message" => "Success"
            ]);
            } catch (\Exception $e) {
                return response()->json([
                    'error' => $e->getMessage()
                ]);
        }
    }

    public function Aktifkan($id){
        DB::table('akreditasi')->update(array('status' => 'nonaktif'));

        $a = Akreditasi::find($id);
                        $history = new Histori;
                        $history->nama = auth()->user()->name;
                        $history->aksi = "Mengaktifkan";
                        $history->keterangan = "Mengaktifkan Akreditasi Tahun '".$a->tanggal_mulai." - ".$a->tanggal_selesai."'";
                        $history->save();
        $a->status = "aktif";
        $a->save();

        return response([
            'message' => 'aktif'
        ]);
    }

    public function nonAktifkan($id){
        $a = Akreditasi::find($id);
                        $history = new Histori;
                        $history->nama = auth()->user()->name;
                        $history->aksi = "Menonaktifkan";
                        $history->keterangan = "Menonaktifkan Akreditasi Tahun '".$a->tanggal_mulai." - ".$a->tanggal_selesai."'";
                        $history->save();
        $a->status = "nonaktif";
        $a->save();

        return response([
            'message' => 'nonaktif'
        ]);
    }

    public function LoadTableAkreditasi(){
        return view('datatable.akademik.TableAkreditasi');
    }

    public function LoadDataAkreditasi(){
        $akreditasi = Akreditasi::orderBy('id','desc')->get();
            return Datatables::of($akreditasi)->addIndexColumn()
            ->addColumn('aksi', function($row){
                $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nilai="'.$row->nilai.'" class="btn-edit-akreditasi" style="font-size: 18pt; text-decoration: none;" class="mr-3">
                <i class="fas fa-pen-square"></i>
                </a>';
                $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn-delete-akreditasi" style="font-size: 18pt; text-decoration: none; color:red;">
                <i class="fas fa-trash"></i>
                </a>';
                return $btn;
         })
         ->rawColumns(['aksi'])
            ->make(true);
    }
}
