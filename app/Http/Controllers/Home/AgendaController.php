<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Agenda;
use App\Histori;
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

          $history = new Histori;
          $history->nama = auth()->user()->name;
          $history->aksi = "Tambah";
          $history->keterangan = "Menambahkan Agenda '".$judul."'";
          $history->save();

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

        if($agenda->judul != $judul){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Agenda '".$bk->judul."' menjadi '".$judul."'";
                    $history->save();
        }
        if($agenda->deskripsi != $deskripsi){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Deskripsi Agenda '".$judul."'";
                    $history->save();
        }
        if($agenda->jam_agenda != $jam){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Jam Agenda '".$judul."'";
                    $history->save();
        }
        if($agenda->tanggal_mulai != $tanggalMulai){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Tanggal Mulai Agenda '".$judul."'";
                    $history->save();
        }
        if($agenda->tanggal_selesai != $tanggalSelesi){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Tanggal Selesai Agenda '".$judul."'";
                    $history->save();
        }
        if($agenda->lokasi != $lokasi){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Lokasi Agenda '".$judul."'";
                    $history->save();
        }

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
        $history = new Histori;
        $history->nama = auth()->user()->name;
        $history->aksi = "Hapus";
        $history->keterangan = "Menghapus Agenda '".$agenda->judul."'";
        $history->save();
        $agenda->delete();
        if($agenda) {
          return response()->json([
            'status' => 'deleted'
          ]);
        }
    }
}
