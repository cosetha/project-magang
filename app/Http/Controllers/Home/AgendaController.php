<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Agenda;
use DataTables;
use File;

class AgendaController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function loadTable()
    {
      return view('datatable.home.tableAgenda');
    }

    public function index()
    {
      $data = Agenda::orderBy('id', 'desc')->get();
      return Datatables::of($data)
      ->addIndexColumn()
      ->addColumn('aksi', function($row){
          $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'"  data-nama="'.$row->judul.'" class="btn-edit-agenda" style="font-size: 18pt; text-decoration: none;" class="mr-3">
          <i class="fas fa-pen-square"></i>
          </a>';
          $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->judul.'" class="btn-delete-agenda" style="font-size: 18pt; text-decoration: none; color:red;">
          <i class="fas fa-trash"></i>
          </a>';
          $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->judul.'" class="btn-show-agenda" style="font-size: 18pt; text-decoration: none; color:green;">
          <i class="fas fa-eye"></i>
          </a>';
          return $btn;
        })
      ->rawColumns(['aksi'])
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
        $judul = $request->judul;
        $deskripsi = $request->deskripsi;
        $jam = $request->jam;
        $tanggalMulai = $request->tanggal_mulai;
        $tanggalSelesi = $request->tanggal_selesai;
        $lokasi = $request->lokasi;

          $agenda = new Agenda;
          $agenda->judul = $judul;
          $agenda->deskripsi = $deskripsi;
          $agenda->jam_agenda = $jam;
          $agenda->tanggal_mulai = $tanggalMulai;
          $agenda->tanggal_selesai = $tanggalSelesi;
          $agenda->lokasi = $lokasi;

          $agenda->save();

          if($agenda) {
            return response()->json([
              'status' => 'ok'
            ]);
          } else {
            return response()->json([
              'status' => 'no_insert'
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
        $data = Agenda::find($id);
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
      $judul = $request->judul;
      $deskripsi = $request->deskripsi;
      $jam = $request->jam;
      $tanggalMulai = $request->tanggal_mulai;
      $tanggalSelesi = $request->tanggal_selesai;
      $lokasi = $request->lokasi;

          $agenda = Agenda::find($id);
          $agenda->judul = $judul;
          $agenda->deskripsi = $deskripsi;
          $agenda->jam_agenda = $jam;
          $agenda->tanggal_mulai = $tanggalMulai;
          $agenda->tanggal_selesai = $tanggalSelesi;
          $agenda->lokasi = $lokasi;

          $agenda->save();

          if($agenda) {
            return response()->json([
              'status' => 'ok'
            ]);
          } else {
            return response()->json([
              'status' => 'no_insert'
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
        $agenda = Agenda::find($id);
        $agenda->delete();
        if($agenda) {
          return response()->json([
            'status' => 'deleted'
          ]);
        }
    }

    function checkGambar($file)
    {
      $file = strtolower($file);
      $ex = array("png","jpg","jpeg","svg","gif");
      if(in_array($file, $ex)) {
        return true;
      }
      return false;
    }
}
