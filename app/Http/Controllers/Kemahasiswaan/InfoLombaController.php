<?php

namespace App\Http\Controllers\Kemahasiswaan;

use Illuminate\Http\Request;
use App\InfoLombaSeminar;
use App\Histori;
use DataTables;

class InfoLombaController
{
    public function loadTable()
    {
        return view('datatable.kemahasiswaan.TableInfoLomba');
    }

    public function index()
    {
      $data = InfoLombaSeminar::orderBy('id', 'desc')->get();
      return Datatables::of($data)
      ->addIndexColumn()
      ->addColumn('aksi', function($row){
          $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" data-judul="'.$row->judul.'" class="btn-edit-lomba" style="font-size: 18pt; text-decoration: none;" class="mr-3">
          <i class="fas fa-pen-square"></i>
          </a>';

          $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-judul="'.$row->judul.'"  class="btn-delete-lomba" style="font-size: 18pt; text-decoration: none; color:red;">

          <i class="fas fa-trash"></i>
          </a>';
          $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn-show-lomba" style="font-size: 18pt; text-decoration: none; color:green;">
          <i class="fas fa-eye"></i>
          </a>';
          return $btn;
        })
      ->rawColumns(['aksi'])
      ->make(true);
    }

    public function store(Request $request)
    {
    	$judul = $request->judul;
    	$deskripsi = $request->deskripsi;
        $lokasi = $request->lokasi;

    	if($judul == "" || $deskripsi == "" || $lokasi = "") {
        return response()->json([
            'status' => 'no_empty'
          ]);
      	}

        $data = new InfoLombaSeminar;
        $data->judul = $request->judul;
        $data->deskripsi = $request->deskripsi;
        $data->lokasi = $request->lokasi;
        $data->save();

        $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Tambah";
                    $history->keterangan = "Menambahkan Lomba / Seminar '".$judul."'";
                    $history->save();

          if($data) {
            return response()->json([
              'status' => 'ok'
            ]);
          } else {
            return response()->json([
              'status' => 'no_insert'
            ]);
          }

    }

    public function edit(Request $request, $id)
    {
      $data = InfoLombaSeminar::find($id);
      if($data) {
        return response()->json([
          'data' => $data
        ]);
      }
    }

    public function update(Request $request, $id)
    {

      $judul = $request->judul;
      $deskripsi = $request->deskripsi;
      $lokasi = $request->lokasi;
      $tanggal = $request->tanggal;

      if($judul == "" || $deskripsi == "" || $lokasi = "" || $tanggal = "") {
        return response()->json([
            'status' => 'no_empty'
          ]);
      }

      $data = InfoLombaSeminar::find($id);
      if($data->judul != $judul){
        $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Lomba / Seminar '".$data->judul."' menjadi '".$judul."'";
                    $history->save();
      }
      if($data->deskripsi != $deskripsi){
        $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Deskripsi Lomba / Seminar '".$judul."'";
                    $history->save();
      }
      if($data->lokasi != $lokasi){
        $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Lokasi Lomba / Seminar '".$judul."'";
                    $history->save();
      }
      if($data->tanggal != $tanggal){
        $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Tanggal Lomba / Seminar '".$judul."'";
                    $history->save();
      }
      $data->judul = $judul;
      $data->deskripsi = $deskripsi;
      $data->lokasi = $request->lokasi;
      $data->tanggal = $request->tanggal;
      $data->save();

		if($data) {
		  return response()->json([
		    'status' => 'ok'
		  ]);
		} else {
		  return response()->json([
		    'status' => 'no_insert'
		  ]);
		}
    }

    public function destroy($id)
    {
      $destroy = InfoLombaSeminar::find($id);
      $history = new Histori;
        $history->nama = auth()->user()->name;
        $history->aksi = "Hapus";
        $history->keterangan = "Menghapus Lomba / Seminar '".$destroy->judul."'";
        $history->save();
      $destroy->delete();

      if($destroy) {
        return response()->json([
          'status' => 'deleted'
        ]);
      }
    }
}
