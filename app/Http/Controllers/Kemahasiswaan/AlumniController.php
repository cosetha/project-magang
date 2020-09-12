<?php

namespace App\Http\Controllers\Kemahasiswaan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Alumni;
use App\Histori;
use App\Bidang_keahlian;
use DataTables;
use Illuminate\Support\Facades\Storage;
use Validator;
class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bk = Bidang_keahlian::all();
        return view('admin.Kemahasiswaan/dataalumniAdmin',['bidang'=>$bk]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'bk.required'=>'Field Bidang Keahlian Perlu di Isi',
            'angkatan.required'=>'Field Angkatan Perlu di Isi',
            'nama.required'=>'Field Nama Perlu di Isi',
            'lulus.required'=>'Field Tahub Lulus Perlu d Isi'
        );
        $validator = Validator::make($request->all(),[
            'nama' => 'required',
            'lulus' => 'required',
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
                $alumni = new Alumni;
                $alumni->nama_alumni = $request->nama;
                $alumni->tgl_lulus = $request->lulus;
                $alumni->kode_bk = $request->bk;
                $alumni->tahun_angkatan = $request->angkatan;
                $alumni->save();

                $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Tambah";
                    $history->keterangan = "Menambahkan Data Alumni '".$request->nama."'";
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
        $data = Alumni::find($id);
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
            'bk.required'=>'Field Bidang Keahlian Perlu di Isi',
            'angkatan.required'=>'Field Angkatan Perlu di Isi',
            'nama.required'=>'Field Nama Perlu di Isi',
            'lulus.required'=>'Field Tahub Lulus Perlu d Isi'
        );
        $validator = Validator::make($request->all(),[
            'nama' => 'required',
            'lulus' => 'required',
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
                $alumni = Alumni::find($id);
                if($alumni->nama_alumni != $request->nama){
                    $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Data Alumni '".$alumni->nama_alumni."' menjadi '".$request->nama."'";
                    $history->save();
                }
                if($alumni->tgl_lulus != $request->lulus){
                    $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Tanggal Lulus Data Alumni '".$request->nama."'";
                    $history->save();
                }
                if($alumni->kode_bk != $request->bk){
                    $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit BK Data Alumni '".$request->nama."'";
                    $history->save();
                }
                if($alumni->tahun_angkatan != $request->angkatan){
                    $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Tahun Angkatan Data Alumni '".$request->nama."'";
                    $history->save();
                }
                $alumni->nama_alumni = $request->nama;
                $alumni->tgl_lulus = $request->lulus;
                $alumni->kode_bk = $request->bk;
                $alumni->tahun_angkatan = $request->angkatan;
                $alumni->save();
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
            $alumni = Alumni::find($id);
            $history = new Histori;
            $history->nama = auth()->user()->name;
            $history->aksi = "Hapus";
            $history->keterangan = "Menghapus Data Alumni '".$alumni->nama_alumni."'";
            $history->save();
            $alumni->delete();
            return response()->json([
                "message" => "Success"
            ]);
            } catch (\Exception $e) {
                return response()->json([
                    'error' => $e->getMessage()
                ]);
        }
    }
    public function LoadTableAlumni(){
        return view('datatable.kemahasiswaan.TableAlumni');
    }

    public function LoadDataAlumni(){
        $headline = ALumni::with('bidangKeahlian')->orderBy('id','desc')->get();
            return Datatables::of($headline)->addIndexColumn()
            ->addColumn('aksi', function($row){
                $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama.'" class="btn-edit-alumni" style="font-size: 18pt; text-decoration: none;" class="mr-3">
                <i class="fas fa-pen-square"></i>
                </a>';
                $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama.'" class="btn-delete-alumni" style="font-size: 18pt; text-decoration: none; color:red;">
                <i class="fas fa-trash"></i>
                </a>';
                return $btn;
         })
         ->rawColumns(['aksi'])
            ->make(true);
    }
}
