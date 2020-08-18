<?php

namespace App\Http\Controllers\Kemahasiswaan;

use Illuminate\Http\Request;
use App\InfoLombaSeminar;
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
        $tanggal = $request->tanggal;

    	if($judul == "" || $deskripsi == "" || $lokasi = "" || $tanggal = "") {
        return response()->json([
            'status' => 'no_empty'
          ]);
      	}

        $data = new InfoLombaSeminar;
        $data->judul = $request->judul;
        $data->deskripsi = $request->deskripsi;
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
      $destroy->delete();

      if($destroy) {
        return response()->json([
          'status' => 'deleted'
        ]);
      }
    }
}
