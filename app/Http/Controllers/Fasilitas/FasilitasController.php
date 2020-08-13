<?php

namespace App\Http\Controllers\Fasilitas;

use Illuminate\Http\Request;
use App\Fasilitas;
use DataTables;
use File;

class FasilitasController
{
    public function loadTable()
    {
        return view('datatable.fasilitas.TableFasilitas');
    }

    public function index()
    {
      $data = Fasilitas::orderBy('id', 'desc')->get();
      return Datatables::of($data)
      ->addIndexColumn()
      ->addColumn('aksi', function($row){
          $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama_fasilitas="'.$row->nama_fasilitas.'" class="btn-edit-fasilitas" style="font-size: 18pt; text-decoration: none;" class="mr-3">
          <i class="fas fa-pen-square"></i>
          </a>';
          
          $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama_fasilitas="'.$row->nama_fasilitas.'"  class="btn-delete-fasilitas" style="font-size: 18pt; text-decoration: none; color:red;">

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
        $nama_fasilitas = $request->nama_fasilitas;
        $deskripsi = $request->deskripsi;
        if($nama_fasilitas == "" || $deskripsi == "") {
          return response()->json([
            'status' => 'no_empty'
          ]);
        } else {
        $gambar = $request->file('gambar');

        $fileName = time().'_'.$gambar->getClientOriginalName();
        $gambar->move('img/fasilitas', $fileName, 'public');

        $data = new Fasilitas;
        $data->nama_fasilitas = $nama_fasilitas;
        $data->deskripsi = $deskripsi;
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
      $data = Fasilitas::find($id);
      if($data) {
        return response()->json([
          'data' => $data
        ]);
      }
    }

    public function update(Request $request, $id)
    {
      $nama_fasilitas = $request->nama_fasilitas;
      $deskripsi = $request->deskripsi;
      $gambar = $request->file('gambar');
      if($nama_fasilitas == "" || $deskripsi == "") {
        return response()->json([
            'status' => 'no_empty'
          ]);
      }

      if($gambar != null) {
          $fileName = time().'_'.$gambar->getClientOriginalName();
          $gambar->move('img/fasilitas', $fileName, 'public');
          $gambarPath = Fasilitas::where('id', $id)->value('gambar');
          File::delete('img/fasilitas/'. $gambarPath);

          $data = Fasilitas::find($id);
          $data->nama_fasilitas = $nama_fasilitas;
          $data->deskripsi = $deskripsi;
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
          $data = Fasilitas::find($id);
          $data->nama_fasilitas = $nama_fasilitas;
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
      $gambarPath = Fasilitas::where('id', $id)->value('gambar');
      File::delete('img/fasilitas/'. $gambarPath);

      $destroy = Fasilitas::find($id);
      $destroy->delete();

      if($destroy) {
        return response()->json([
          'status' => 'deleted'
        ]);
      }
    }

    public function show($id)
    {

    }

}
