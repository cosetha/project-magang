<?php

namespace App\Http\Controllers\Akademik;

use Illuminate\Http\Request;
use App\Semester;
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
      ->rawColumns(['aksi'])
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
        $kalender->save();
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
        KA::destroy($id);
        return response()->json([
          'status' => 'deleted'
        ]);
    }

    public function listSemester()
    {
      $data = Semester::where('status', 'aktif')->get();
      return response()->json([
        'data' => $data
      ]);
    }

}
