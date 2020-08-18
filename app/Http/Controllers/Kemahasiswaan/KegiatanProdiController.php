<?php

namespace App\Http\Controllers\Kemahasiswaan;

use Illuminate\Http\Request;
use App\KegiatanProdi;
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
      $destroy->delete();

      if($destroy) {
        return response()->json([
          'status' => 'deleted'
        ]);
      }
    }
}
