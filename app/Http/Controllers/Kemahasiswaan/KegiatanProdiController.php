<?php

namespace App\Http\Controllers\Kemahasiswaan;

use Illuminate\Http\Request;
use App\KegiatanProdi;
use App\Histori;
use DataTables;
use File;

class KegiatanProdiController
{
    public function loadTable()
    {
        return view('datatable.kemahasiswaan.TableKegiatan');
    }

    public function index()
    {
      $data = KegiatanProdi::orderBy('id', 'desc')->get();
      return Datatables::of($data)
      ->addIndexColumn()
      ->addColumn('aksi', function($row){
          $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" data-judul="'.$row->judul.'" class="btn-edit-kegiatan" style="font-size: 18pt; text-decoration: none;" class="mr-3">
          <i class="fas fa-pen-square"></i>
          </a>';

          $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-judul="'.$row->judul.'"  class="btn-delete-kegiatan" style="font-size: 18pt; text-decoration: none; color:red;">

          <i class="fas fa-trash"></i>
          </a>';
          $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn-show-kegiatan" style="font-size: 18pt; text-decoration: none; color:green;">
          <i class="fas fa-eye"></i>
          </a>';
          return $btn;
        })
      ->rawColumns(['aksi'])
      ->make(true);
    }

    public function store(Request $request)
    {
      if($request->hasFile('thumbnail')) {
        $judul = $request->judul;
        $lokasi = $request->lokasi;
        $tanggal = $request->tanggal;
        $gambar = $request->gambar;

        if($judul == "" || $lokasi = "" || $gambar == "" || $tanggal == "") {
          return response()->json([
            'status' => 'no_empty'
          ]);
        } else {
        $thumbnail = $request->file('thumbnail');

        $fileName = time().'_'.$thumbnail->getClientOriginalName();
        $thumbnail->move('img/kemahasiswaan/kegiatan', $fileName, 'public');

        $data = new KegiatanProdi;
        $data->judul = $judul;
        $data->lokasi = $request->lokasi;
        $data->gambar = $gambar;
        $data->tanggal = $tanggal;
        $data->thumbnail = $fileName;
        $data->save();

        $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Tambah";
                    $history->keterangan = "Menambahkan Kegiatan Prodi '".$judul."'";
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
          'status' => 'no_thumbnail'
        ]);
      }

    }

    public function edit(Request $request, $id)
    {
      $data = KegiatanProdi::find($id);
      if($data) {
        return response()->json([
          'data' => $data
        ]);
      }
    }

    public function update(Request $request, $id)
    {

      $judul = $request->judul;
      $lokasi = $request->lokasi;
      $gambar = $request->gambar;
      $tanggal = $request->tanggal;
      $thumbnail = $request->file('thumbnail');
      if($judul == "" || $gambar == "" || $tanggal = "" || $lokasi = "") {
        return response()->json([
            'status' => 'no_empty'
          ]);
      }

      if($thumbnail != null) {
          $fileName = time().'_'.$thumbnail->getClientOriginalName();
          $thumbnail->move('img/kemahasiswaan/kegiatan', $fileName, 'public');
          $thumbnailPath = KegiatanProdi::where('id', $id)->value('thumbnail');
          File::delete('img/kemahasiswaan/kegiatan/'. $thumbnailPath);

          $data = KegiatanProdi::find($id);
          if($data->judul != $judul){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Kegiatan Prodi '".$data->judul."' menjadi '".$judul."'";
                    $history->save();
          }
          if($data->lokasi != $lokasi){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Lokasi Kegiatan Prodi '".$judul."'";
                    $history->save();
          }
          if($data->gambar != $gambar){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Gambar Kegiatan Prodi '".$judul."'";
                    $history->save();
          }
          if($data->tanggal != $tanggal){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Tanggal Kegiatan Prodi '".$judul."'";
                    $history->save();
          }
          if($data->thumbnail != $fileName){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Thumbnail Kegiatan Prodi '".$judul."'";
                    $history->save();
          }
          $data->judul = $judul;
          $data->lokasi = $request->lokasi;
          $data->gambar = $gambar;
          $data->tanggal = $request->tanggal;
          $data->thumbnail = $fileName;
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

          $data = KegiatanProdi::find($id);
          if($data->judul != $judul){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Kegiatan Prodi '".$data->judul."' menjadi '".$judul."'";
                    $history->save();
          }
          if($data->lokasi != $lokasi){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Lokasi Kegiatan Prodi '".$judul."'";
                    $history->save();
          }
          if($data->gambar != $gambar){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Gambar Kegiatan Prodi '".$judul."'";
                    $history->save();
          }
          if($data->tanggal != $tanggal){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Tanggal Kegiatan Prodi '".$judul."'";
                    $history->save();
          }
          $data->judul = $judul;
          $data->lokasi = $request->lokasi;
          $data->gambar = $gambar;
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
    }

    public function destroy($id)
    {
      $thumbnailPath = KegiatanProdi::where('id', $id)->value('thumbnail');
      File::delete('img/kemahasiswaan/kegiatan/'. $thumbnailPath);

      $destroy = KegiatanProdi::find($id);
      $history = new Histori;
        $history->nama = auth()->user()->name;
        $history->aksi = "Hapus";
        $history->keterangan = "Menghapus Kegiatan Prodi '".$destroy->judul."'";
        $history->save();
      $destroy->delete();

      if($destroy) {
        return response()->json([
          'status' => 'deleted'
        ]);
      }
    }
}
