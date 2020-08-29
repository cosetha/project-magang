<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Pengumuman;
use DataTables;
use File;

class PengumumanController
{
    public function loadTable()
    {
        return view('datatable.home.tablePengumuman');
    }

    public function index()
    {
      $data = Pengumuman::orderBy('id', 'desc')->get();
      return Datatables::of($data)
      ->addIndexColumn()
      ->addColumn('aksi', function($row){
          $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'"  data-nama="'.$row->judul.'" class="btn-edit-pengumuman" style="font-size: 18pt; text-decoration: none;" class="mr-3">
          <i class="fas fa-pen-square"></i>
          </a>';
          $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->judul.'" class="btn-delete-pengumuman" style="font-size: 18pt; text-decoration: none; color:red;">
          <i class="fas fa-trash"></i>
          </a>';
          $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->judul.'" class="btn-show-pengumuman" style="font-size: 18pt; text-decoration: none; color:green;">
          <i class="fas fa-eye"></i>
          </a>';
          return $btn;
        })
      ->rawColumns(['aksi'])
      ->make(true);
    }

    public function store(Request $request)
    {
      if($request->hasFile('lampiran')) {
        $judul = $request->judul;
        $deskripsi = $request->deskripsi;
        if($judul == "" || $deskripsi == "") {
          return response()->json([
            'status' => 'no_empty'
          ]);
        } else {
        $lampiran = $request->file('lampiran');

        $fileName = time().'_'.$lampiran->getClientOriginalName();
        $lampiran->move('file/pengumuman', $fileName, 'public');

        $data = new Pengumuman;
        $data->judul = $judul;
        $data->deskripsi = $deskripsi;
        $data->lampiran = 'file/pengumuman/'.$fileName;
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
          'status' => 'no_lampiran'
        ]);
      }

    }

    public function edit(Request $request, $id)
    {
      $data = Pengumuman::find($id);
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
      $lampiran = $request->file('lampiran');
      if($judul == "" || $deskripsi == "") {
        return response()->json([
            'status' => 'no_empty'
          ]);
      }

      if($lampiran != null) {
          $fileName = time().'_'.$lampiran->getClientOriginalName();
          $lampiran->move('file/pengumuman', $fileName, 'public');
          $lampiranPath = Pengumuman::find($id)->value('lampiran');
          File::delete($lampiranPath);

          $data = Pengumuman::find($id);
          $data->judul = $judul;
          $data->deskripsi = $deskripsi;
          $data->lampiran = 'file/pengumuman/'.$fileName;
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
          $data = Pengumuman::find($id);
          $data->judul = $judul;
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
      $lampiranPath = Pengumuman::find($id)->value('lampiran');
      File::delete($lampiranPath);

      $destroy = Pengumuman::find($id);
      $destroy->delete();

      if($destroy) {
        return response()->json([
          'status' => 'deleted'
        ]);
      }
    }

    public function show($id)
    {
      $data = Pengumuman::find($id);
      return response()->json([
        'data' => $data
      ]);
    }

}
