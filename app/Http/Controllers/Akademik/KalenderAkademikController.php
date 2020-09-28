<?php

namespace App\Http\Controllers\Akademik;

use Illuminate\Http\Request;
use App\Semester;
use App\Histori;
use App\KalenderAkademik as KA;
use Illuminate\Support\Facades\DB;
use DataTables;

class KalenderAkademikController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = DB::table('kalender_akademik as k')
      ->join('semester as s', 'k.kode_semester', '=', 's.id')
      ->select('k.*', 's.semester')
      ->orderBy('id', 'desc')
      ->get();
      return Datatables::of($data)
      ->addIndexColumn()
      ->addColumn('aksi', function($row){
          $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn-edit-kalender" style="font-size: 18pt; text-decoration: none;" class="mr-3">
          <i class="fas fa-pen-square"></i>
          </a>';
          $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn-delete-kalender" style="font-size: 18pt; text-decoration: none; color:red;">
          <i class="fas fa-trash"></i>
          </a>';
          $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->judul.'" class="btn-show-kalender" style="font-size: 18pt; text-decoration: none; color:green;">
          <i class="fas fa-eye"></i>
          </a>';
          return $btn;
        })
        ->addColumn('status', function($row){
          $stateAktif = null;
          $stateNonaktif = null;
          if($row->status == "aktif") {
            $stateAktif = 'disabled';
            $stateNonaktif = '';
          } else {
            $stateAktif = '';
            $stateNonaktif = 'disabled';
          }
          $btn = '<button class="btn btn-success" data-id="'.$row->id.'" id="btn-aktif" '.$stateAktif.'>Aktifkan</button> &nbsp;';
          $btn = $btn. '<button class="btn btn-success" data-id="'.$row->id.'" id="btn-nonaktif" '.$stateNonaktif.'>Non-aktifkan</button>';
          return $btn;
        })
      ->rawColumns(['aksi', 'status'])
      ->make(true);
    }

    public function loadTable()
    {
      return view('datatable.akademik.tableKalender');
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
        $nama = $request->nama_kegiatan;
        $deskripsi = $request->deskripsi;
        $semester = $request->semester;

        $kalender =  new KA;
        $kalender->judul = $nama;
        $kalender->kode_semester = $semester;
        $kalender->deskripsi = $deskripsi;
        $kalender->status = 'nonaktif';
        $kalender->save();

        $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Tambah";
                    $history->keterangan = "Menambahkan Kalender Akademik '".$nama."'";
                    $history->save();

        if($kalender) {
          return response()->json([
            'status' => 'ok'
          ]);
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
      $data = DB::table('kalender_akademik as k')->where('k.id', $id)
      ->join('semester as s', 'k.kode_semester', '=', 's.id')
      ->select('k.*', 's.semester')
      ->get();
      return response()->json([
        'data' => $data
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = KA::find($id);
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
      $nama = $request->nama_kegiatan;
      $deskripsi = $request->deskripsi;
      $semester = $request->semester;

      $kalender =  KA::find($id);
      if($kalender->judul != $nama){
        $history = new Histori;
        $history->nama = auth()->user()->name;
        $history->aksi = "Edit";
        $history->keterangan = "Mengedit Nama Kegiatan Kalender Akademik '".$nama."'";
        $history->save();
      }
      if($kalender->kode_semester != $semester){
        $history = new Histori;
        $history->nama = auth()->user()->name;
        $history->aksi = "Edit";
        $history->keterangan = "Mengedit Semester Kalender Akademik '".$nama."'";
        $history->save();

      }
      if($kalender->deskripsi != $deskripsi){
        $history = new Histori;
        $history->nama = auth()->user()->name;
        $history->aksi = "Edit";
        $history->keterangan = "Mengedit Deskripsi Kalender Akademik '".$nama."'";
        $history->save();
      }
      $kalender->judul = $nama;
      $kalender->kode_semester = $semester;
      $kalender->deskripsi = $deskripsi;
      $kalender->save();
      if($kalender) {
        return response()->json([
          'status' => 'ok'
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
        $k = KA::find($id);
        $history = new Histori;
        $history->nama = auth()->user()->name;
        $history->aksi = "Hapus";
        $history->keterangan = "Menghapus Kalender Akademik '".$k->judul."'";
        $history->save();

        KA::destroy($id);
        return response()->json([
          'status' => 'deleted'
        ]);
    }

    public function setAktif($id)
    {
      $k = KA::find($id);
      $k->status = 'aktif';
      $k->save();
      if($k) {
        return response()->json([
          'status' => 'ok'
        ]);
      }
    }

    public function setNonaktif($id)
    {
      $k = KA::find($id);
      $k->status = 'nonaktif';
      $k->save();
      if($k) {
        return response()->json([
          'status' => 'ok'
        ]);
      }
    }

    public function listSemester()
    {
      $data = Semester::where('status', 'aktif')->get();
      return response()->json([
        'data' => $data
      ]);
    }

}
