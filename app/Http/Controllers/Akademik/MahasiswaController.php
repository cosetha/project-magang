<?php

namespace App\Http\Controllers\Akademik;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Histori;
use App\Bidang_keahlian;
use DataTables;
use Illuminate\Support\Facades\Storage;
use Validator;
use App\Exports\MahasiswaExport;
use App\Imports\MahasiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bk = Bidang_keahlian::all();
        return view('admin/Akademik/mahasiswaAdmin',['bidang'=>$bk]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messsages = array(
            'nama.required'=>'Field Nama Perlu di Isi',
            'nim.required'=>'Field NIM Perlu di Isi',
            'nim.numeric'=>'Format NIM Salah',
            'nim.unique'=>'NIM sudah digunakan',
            'angkatan.required'=>'Field Angkatan di Isi',
            'bk.required'=>'Field Bidang Keahlian Perlu di isi'

        );
        $validator = Validator::make($request->all(),[
            'nama' => 'required',
            'nim' => 'required|numeric|unique:mahasiswa,nim',
            "angkatan" => 'required',
            "bk" => 'required'],$messsages
        );
        if ($validator->fails()) {
            $error = $validator->errors()->first();

            return response()->json([
                'error' => $error,
              ]);
         }else{
            try {
                $mahasiswa = new Mahasiswa;
                $mahasiswa->nama = $request->nama;
                $mahasiswa->nim = $request->nim;
                $mahasiswa->kode_bk = $request->bk;
                $mahasiswa->angkatan = $request->angkatan;
                $mahasiswa->save();

                $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Tambah";
                    $history->keterangan = "Menambahkan Mahasiswa '".$request->nama."'";
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Mahasiswa::find($id);

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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messsages = array(
            'nama.required'=>'Field Nama Perlu di Isi',
            'nim.required'=>'Field NIM Perlu di Isi',
            'angkatan.required'=>'Field Angkatan di Isi',
            'nim.numeric'=>'Format NIM Salah',
            'nim.unique'=>'NIM sudah digunakan',
            'bk.required'=>'Field Bidang Keahlian Perlu di isi'
        );
        $validator = Validator::make($request->all(),[
            'nama' => 'required',
            'nim' => 'required|numeric|unique:mahasiswa,nim,'.$id,
            "angkatan" => 'required',
            "bk" => 'required'],$messsages
        );
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return response()->json([
                'error' => $error,
              ]);
         }else{
            try {
                $mahasiswa = Mahasiswa::find($id);
                if($mahasiswa->nama != $request->nama){
                    $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Mahasiswa '".$mahasiswa->nama."' menjadi '".$request->nama."'";
                    $history->save();
                }
                if($mahasiswa->nim != $request->nim){
                    $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit NIM Mahasiswa '".$request->nama."'";
                    $history->save();
                }
                if($mahasiswa->kode_bk != $request->bk){
                    $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Kode BK Mahasiswa '".$request->nama."'";
                    $history->save();
                }
                if($mahasiswa->angkatan != $request->angkatan){
                    $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Angkatan Mahasiswa '".$request->nama."'";
                    $history->save();
                }
                $mahasiswa->nama = $request->nama;
                $mahasiswa->nim = $request->nim;
                $mahasiswa->kode_bk = $request->bk;
                $mahasiswa->angkatan = $request->angkatan;
                $mahasiswa->save();
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $mahasiswa = Mahasiswa::find($id);
            $history = new Histori;
            $history->nama = auth()->user()->name;
            $history->aksi = "Hapus";
            $history->keterangan = "Menghapus Mahasiswa '".$mahasiswa->nama."'";
            $history->save();
            $mahasiswa->delete();
            return response()->json([
                "message" => "Success"
            ]);
            } catch (\Exception $e) {
                return response()->json([
                    'error' => $e->getMessage()
                ]);
            }
    }
    public function LoadTableMahasiswa(){
        return view('datatable.akademik.TableMahasiswa');
    }

    public function LoadDataMahasiswa(){
        $mhs = Mahasiswa::with('bidangKeahlian')->orderBy('id','desc')->get();
            return Datatables::of($mhs)->addIndexColumn()
            ->addColumn('aksi', function($row){
                $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama.'" class="btn-edit-mahasiswa" style="font-size: 18pt; text-decoration: none;" class="mr-3">
                <i class="fas fa-pen-square"></i>
                </a>';
                $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama.'" class="btn-delete-mahasiswa" style="font-size: 18pt; text-decoration: none; color:red;">
                <i class="fas fa-trash"></i>
                </a>';
                return $btn;
         })
         ->rawColumns(['aksi'])
            ->make(true);
    }

    public function export_excel(Request $request)
    {
        if($request->type == 'Excel'){
            try {
                return Excel::download(new MahasiswaExport($request), 'mahasiswa.xlsx');
            } catch (\Throwable $th) {

            }

        }else if($request->type == 'Pdf'){
            if($request->bk == 0 ){
                $mhs = Mahasiswa::with('bidangKeahlian')->get();
                $pdf = PDF::loadview('PDF/Mhs_PDF',['mhs'=>$mhs]);
                return $pdf->download('laporan-mahasiswa.pdf');
            }else {
                $mhs = Mahasiswa::where('kode_bk', $request->bk)->get();
                $pdf = PDF::loadview('PDF/Mhs_PDF',['mhs'=>$mhs]);
                return $pdf->download('laporan-mahasiswa.pdf');
            }

        }

    }
    public function import_excel(Request $request)
    {
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        try {
         $file = $request->file('file');
        Excel::import(new MahasiswaImport, $file);
        $history = new Histori;
        $history->nama = auth()->user()->name;
        $history->aksi = "Tambah";
        $history->keterangan = "Mengimport file Mahasiswa";
        $history->save();
		return redirect('/mahasiswa');
        } catch (\Throwable $th) {

        }

    }
    public function download_format(){
        // return response([
        //     'message' => "downloaded!"
        // ]);
        return response()->download('EXCEL/Mahasiswa/example_mahasiswa_format.xlsx');
    }
    // public function load_mhs(Request $request)
    // {
    //     $data = Mahasiswa::all();
    //     $output = [];
    //     $i = 1;
    //     foreach ($data as $mhs)
    //     {
    //         echo($mhs->bidangKeahlian()->first()->nama_bk);
    //     }
    // }
}
