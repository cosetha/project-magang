<?php

namespace App\Http\Controllers\Kemahasiswaan;

use Illuminate\Http\Request;
use App\OrganisasiMahasiswa;
use App\Histori;
use DataTables;
use File;

class OrganisasiMahasiswaController
{
    public function loadTable()
    {
        return view('datatable.kemahasiswaan.TableOrganisasi');
    }

    public function index()
    {
      $data = OrganisasiMahasiswa::orderBy('id', 'desc')->get();
      return Datatables::of($data)
      ->addIndexColumn()
      ->addColumn('aksi', function($row){
          $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama.'" class="btn-edit-organisasi" style="font-size: 18pt; text-decoration: none;" class="mr-3">
          <i class="fas fa-pen-square"></i>
          </a>';

          $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama.'"  class="btn-delete-organisasi" style="font-size: 18pt; text-decoration: none; color:red;">
          <i class="fas fa-trash"></i>
          </a>';
          $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama.'" class="btn-show-om" style="font-size: 18pt; text-decoration: none; color:green;">
                <i class="fas fa-eye"></i>
                </a>';
          return $btn;
        })
      ->rawColumns(['aksi'])
      ->make(true);
    }

    public function store(Request $request)
    {
      if($request->hasFile('logo')) {
        $nama = $request->nama;
        $deskripsi = $request->deskripsi;
        if($nama == "" || $deskripsi == "") {
          return response()->json([
            'status' => 'no_empty'
          ]);
        } else {
        $logo = $request->file('logo');

        $fileName = time().'_'.$logo->getClientOriginalName();
        $logo->move('img/kemahasiswaan/organisasi', $fileName, 'public');

        $data = new OrganisasiMahasiswa;
        $data->nama = $nama;
        $data->deskripsi = $deskripsi;
        $data->logo = $fileName;
        $data->save();

        $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Tambah";
                    $history->keterangan = "Menambahkan Organisasi '".$nama."'";
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
          'status' => 'no_logo'
        ]);
      }

    }

    public function edit(Request $request, $id)
    {
      $data = OrganisasiMahasiswa::find($id);
      if($data) {
        return response()->json([
          'data' => $data
        ]);
      }
    }

    public function update(Request $request, $id)
    {
      $nama = $request->nama;
      $deskripsi = $request->deskripsi;
      $logo = $request->file('logo');
      if($nama == "" || $deskripsi == "" ) {
        return response()->json([
            'status' => 'no_empty'
          ]);
      }

      if($logo != null) {
          $fileName = time().'_'.$logo->getClientOriginalName();
          $logo->move('img/kemahasiswaan/organisasi', $fileName, 'public');
          $logoPath = OrganisasiMahasiswa::where('id', $id)->value('logo');
          File::delete('img/kemahasiswaan/organisasi/'. $logoPath);

          $data = OrganisasiMahasiswa::find($id);
          if($data->nama != $nama){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Organisasi '".$data->nama."' menjadi '".$nama."'";
                    $history->save();
          }
          if($data->deskripsi != $deskripsi){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Deskripsi Organisasi '".$nama."'";
                    $history->save();
          }
          if($data->logo != $fileName){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Logo Organisasi '".$nama."'";
                    $history->save();
          }
          $data->nama = $nama;
          $data->deskripsi = $deskripsi;
          $data->logo = $fileName;
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

          $data = OrganisasiMahasiswa::find($id);
          if($data->nama != $nama){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Organisasi '".$data->nama."' menjadi '".$nama."'";
                    $history->save();
          }
          if($data->deskripsi != $deskripsi){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Deskripsi Organisasi '".$nama."'";
                    $history->save();
          }
          $data->nama = $nama;
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
      $logoPath = OrganisasiMahasiswa::where('id', $id)->value('logo');
      File::delete('img/kemahasiswaan/organisasi/'. $logoPath);

      $destroy = OrganisasiMahasiswa::find($id);
      $history = new Histori;
        $history->nama = auth()->user()->name;
        $history->aksi = "Hapus";
        $history->keterangan = "Menghapus Organisasi '".$destroy->nama."'";
        $history->save();
      $destroy->delete();

      if($destroy) {
        return response()->json([
          'status' => 'deleted'
        ]);
      }
    }
}
