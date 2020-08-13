<?php

namespace App\Http\Controllers\Riset;

use Illuminate\Http\Request;
use App\Pengabdian;
use DataTables;
use File;

class PengabdianController
{
    public function loadTable()
    {
        return view('datatable.riset.TablePengabdian');
    }

    public function index()
    {
      $data = Pengabdian::orderBy('id', 'desc')->get();
      return Datatables::of($data)
      ->addIndexColumn()
      ->addColumn('aksi', function($row){
          $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" data-judul="'.$row->judul.'" class="btn-edit-pengabdian" style="font-size: 18pt; text-decoration: none;" class="mr-3">
          <i class="fas fa-pen-square"></i>
          </a>';
          
          $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-judul="'.$row->judul.'"  class="btn-delete-pengabdian" style="font-size: 18pt; text-decoration: none; color:red;">

          <i class="fas fa-trash"></i>
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
        $deskripsi = $request->deskripsi;
        $tahun = $request->tahun;
        if($judul == "" || $deskripsi == "" || $tahun == "") {
          return response()->json([
            'status' => 'no_empty'
          ]);
        } else {
        $gambar = $request->file('gambar');

        $fileName = time().'_'.$gambar->getClientOriginalName();
        $gambar->move('img/riset/pengabdian', $fileName, 'public');

        $data = new Pengabdian;
        $data->judul = $judul;
        $data->deskripsi = $deskripsi;
        $data->tahun = $tahun;
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
        }

      } else {
        return response()->json([
          'status' => 'no_gambar'
        ]);
      }

    }

    public function edit(Request $request, $id)
    {
      $data = Pengabdian::find($id);
      if($data) {
        return response()->json([
          'data' => $data
        ]);
      }
    }

    public function update(Request $request, $id)
    {
      $judul = $request->judul;
      $tahun = $request->tahun;
      $deskripsi = $request->deskripsi;
      $gambar = $request->file('gambar');
      if($judul == "" || $deskripsi == "" || $tahun = "") {
        return response()->json([
            'status' => 'no_empty'
          ]);
      }

      if($gambar != null) {
          $fileName = time().'_'.$gambar->getClientOriginalName();
          $gambar->move('img/riset/pengabdian', $fileName, 'public');
          $gambarPath = Pengabdian::where('id', $id)->value('gambar');
          File::delete('img/riset/pengabdian/'. $gambarPath);

          $data = Pengabdian::find($id);
          $data->judul = $judul;
          $data->deskripsi = $deskripsi;
          $data->tahun = $tahun;
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
          $data = Pengabdian::find($id);
          $data->judul = $judul;
          $data->tahun = $tahun;
          $data->deskripsi = $deskripsi;
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
      $gambarPath = Pengabdian::where('id', $id)->value('gambar');
      File::delete('img/riset/pengabdian/'. $gambarPath);

      $destroy = Pengabdian::find($id);
      $destroy->delete();

      if($destroy) {
        return response()->json([
          'status' => 'deleted'
        ]);
      }
    }

}
