<?php

namespace App\Http\Controllers\Riset;

use Illuminate\Http\Request;
use App\Penelitian;
use App\Histori;
use DataTables;
use File;

class PenelitianController
{
    public function loadTable()
    {
        return view('datatable.riset.TablePenelitian');
    }

    public function index()
    {
      $data = Penelitian::orderBy('id', 'desc')->get();
      return Datatables::of($data)
      ->addIndexColumn()
      ->addColumn('aksi', function($row){
          $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" data-judul="'.$row->judul.'" class="btn-edit-penelitian" style="font-size: 18pt; text-decoration: none;" class="mr-3">
          <i class="fas fa-pen-square"></i>
          </a>';

          $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-judul="'.$row->judul.'"  class="btn-delete-penelitian" style="font-size: 18pt; text-decoration: none; color:red;">

          <i class="fas fa-trash"></i>
          </a>';

          $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->judul.'" class="btn-show-penelitian" style="font-size: 18pt; text-decoration: none; color:green;">
                <i class="fas fa-eye"></i>
        </a>';
          return $btn;
        })
      ->rawColumns(['aksi'])
      ->make(true);
    }

    public function store(Request $request)
    {
      if($request->hasFile('gambar')) {
        $judul = $request->judul;
        $peneliti = $request->peneliti;
        $deskripsi = $request->deskripsi;
        $tahun = $request->tahun;
        if($judul == "" || $peneliti = "" || $deskripsi == "" || $request->luaran == "" || $tahun == "") {
          return response()->json([
            'status' => 'no_empty'
          ]);
        } else {
        $gambar = $request->file('gambar');

        $fileName = time().'_'.$gambar->getClientOriginalName();
        $gambar->move('img/riset/penelitian', $fileName, 'public');

        $data = new Penelitian;
        $data->judul = $judul;
        $data->peneliti = $request->peneliti;
        $data->deskripsi = $deskripsi;
        $data->hasil_luaran = $request->luaran;
        $data->tahun = $tahun;
        $data->gambar = $fileName;
        $data->save();

        $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Tambah";
                    $history->keterangan = "Menambahkan Penelitian '".$judul."'";
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

      } else {
        return response()->json([
          'status' => 'no_gambar'
        ]);
      }

    }

    public function edit(Request $request, $id)
    {
      $data = Penelitian::find($id);
      if($data) {
        return response()->json([
          'data' => $data
        ]);
      }
    }

    public function update(Request $request, $id)
    {

      $judul = $request->judul;
      $peneliti = $request->peneliti;
      $deskripsi = $request->deskripsi;
      $tahun = $request->tahun;
      $gambar = $request->file('gambar');
      if($judul == "" || $deskripsi == "" || $request->luaran == "" || $tahun = "") {
        return response()->json([
            'status' => 'no_empty'
          ]);
      }

      if($gambar != null) {
          $fileName = time().'_'.$gambar->getClientOriginalName();
          $gambar->move('img/riset/penelitian', $fileName, 'public');
          $gambarPath = Penelitian::where('id', $id)->value('gambar');
          File::delete('img/riset/penelitian/'. $gambarPath);

          $data = Penelitian::find($id);
          if($data->judul != $judul){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Penelitian '".$data->judul."' menjadi '".$judul."'";
                    $history->save();
          }
          if($data->peneliti != $peneliti){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Nama Peneliti '".$judul."'";
                    $history->save();
          }
          if($data->deskripsi != $deskripsi){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Deskripsi Penelitian '".$judul."'";
                    $history->save();
          }
          if($data->tahun != $tahun){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Tahun Penelitian '".$judul."'";
                    $history->save();
          }
          if($data->gambar != $fileName){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Gambar Penelitian '".$judul."'";
                    $history->save();
          }
          $data->judul = $judul;
          $data->peneliti = $request->peneliti;
          $data->deskripsi = $deskripsi;
          $data->hasil_luaran = $request->luaran;
          $data->tahun = $request->tahun;
          $data->gambar = $fileName;
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

      } else {

          $data = Penelitian::find($id);
          if($data->judul != $judul){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Penelitian '".$data->judul."' menjadi '".$judul."'";
                    $history->save();
          }
          if($data->peneliti != $peneliti){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Nama Peneliti '".$judul."'";
                    $history->save();
          }
          if($data->deskripsi != $deskripsi){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Deskripsi Penelitian '".$judul."'";
                    $history->save();
          }
          if($data->tahun != $tahun){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Tahun Penelitian '".$judul."'";
                    $history->save();
          }
          $data->judul = $judul;
          $data->peneliti = $request->peneliti;
          $data->deskripsi = $deskripsi;
          $data->hasil_luaran = $request->luaran;
          $data->tahun = $request->tahun;
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
    }

    public function destroy($id)
    {
      $gambarPath = Penelitian::where('id', $id)->value('gambar');
      File::delete('img/riset/penelitian/'. $gambarPath);

      $destroy = Penelitian::find($id);
      $history = new Histori;
        $history->nama = auth()->user()->name;
        $history->aksi = "Hapus";
        $history->keterangan = "Menghapus Penelitian '".$destroy->judul."'";
        $history->save();
      $destroy->delete();

      if($destroy) {
        return response()->json([
          'status' => 'deleted'
        ]);
      }
    }

}
