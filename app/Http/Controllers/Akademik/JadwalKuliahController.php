<?php

namespace App\Http\Controllers\Akademik;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables, File, Validator;
use App\Semester;
use App\Histori;
use App\Bidang_keahlian as BK;
use App\Jadwal_kuliah as J;

class JadwalKuliahController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = DB::table('jadwal_kuliah as j')
      ->join('bidang_keahlian as b', 'j.kode_bk', '=', 'b.id')
      ->join('semester as smt', 'j.kode_semester', '=', 'smt.id')
      ->select('j.*', 'b.nama_bk', 'smt.semester')
      ->orderBy('id', 'desc')
      ->get();
      return Datatables::of($data)
      ->addIndexColumn()
      ->addColumn('aksi', function($row){
          $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn-edit-jadwal" style="font-size: 18pt; text-decoration: none;" class="mr-3">
          <i class="fas fa-pen-square"></i>
          </a>';
          $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn-delete-jadwal" style="font-size: 18pt; text-decoration: none; color:red;">
          <i class="fas fa-trash"></i>
          </a>';
          return $btn;
        })
        ->addColumn('file_jadwal', function($row){
            $file = '<a href="'.$row->file.'" >'.$row->file.'</a>';
            return $file;
          })
      ->rawColumns(['aksi', 'file_jadwal'])
      ->make(true);
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
        $nama = $request->nama;
        $semester = $request->semester;
        $bk = $request->bk;
        $validator = Validator::make($request->all(), [
          'file' => 'required|max:8192|mimes:doc,docx,pdf,xls,xlsx'
        ]);
        
        if ($validator->passes()) {
        $file = $request->file('file');
          $fileNameOri = $file->getClientOriginalName();
          $fileName = time().'_'.$fileNameOri;
          $filePath = "file/jadwal_kuliah";
          $file->move($filePath, $fileName, "public");

          $jadwal = new J;
          $jadwal->nama_jadwal = $nama;
          $jadwal->file = $filePath.'/'.$fileName;
          $jadwal->kode_bk = $semester;
          $jadwal->kode_semester = $semester;
          $jadwal->save();

          $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Tambah";
                    $history->keterangan = "Menambahkan Jadwal Kuliah '".$nama."'";
                    $history->save();
          if($jadwal) {
            return response()->json([
              'status' => 'ok'
            ]);
          }
      }
      return response()->json([
          'status' => $validator->errors()->first()
      ]);
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
        $data = J::find($id);
        return response()->json([
          'data' => $data
        ]);
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
      $nama = $request->nama;
      $semester = $request->semester;
      $bk = $request->bk;
      $file = $request->file('file');
      if($file != null) {
        $fileNameOri = $file->getClientOriginalName();
        $fileName = time().'_'.$fileNameOri;
        $filePath = "file/jadwal_kuliah";
        $file->move($filePath, $fileName, "public");
        $fileDelete = J::find($id)->value('file');
        File::delete($fileDelete);

        $jadwal = J::find($id);
        if($jadwal->nama_jadwal != $nama){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Jadwal Kuliah '".$jadwal->nama_jadwal."' menjadi '".$nama."'";
                    $history->save();
        }
        if($jadwal->kode_bk != $bk){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit BK Jadwal Kuliah '".$nama."'";
                    $history->save();
        }
        if($jadwal->kode_semester != $semester){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Semester Jadwal Kuliah '".$nama."'";
                    $history->save();
        }
        if($jadwal->file != $filePath.'/'.$fileName){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit File Jadwal Kuliah '".$nama."'";
                    $history->save();
        }
        $jadwal->nama_jadwal = $nama;
        $jadwal->file = $filePath.'/'.$fileName;
        $jadwal->kode_bk = $bk;
        $jadwal->kode_semester = $semester;
        $jadwal->save();
        if($jadwal) {
          return response()->json([
            'status' => 'ok'
          ]);
        }
      } else {
        return response()->json([
          'status' => 'empty_file'
        ]);
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
        $fileDelete = J::find($id)->value('file');

        $j = J::find($id);
        $history = new Histori;
        $history->nama = auth()->user()->name;
        $history->aksi = "Hapus";
        $history->keterangan = "Menghapus Jadwal Kuliah '".$j->nama_jadwal."'";
        $history->save();

        File::delete($fileDelete);
        J::destroy($id);
        return response()->json([
          'status' => 'deleted'
        ]);
    }

    public function loadTable()
    {
      return view('datatable.akademik.tableJadwal');
    }

    public function list()
    {
      $data = Semester::where('status', 'aktif')->get();
      $bk = BK::get();
      return response()->json([
        'semester' => $data,
        'bk' => $bk
      ]);
    }
}
