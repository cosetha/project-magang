<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Bidang_keahlian as BK;
use App\Prestasi;
use App\Histori;
use App\Bidang_keahlian;
use Illuminate\Support\Facades\DB;
use DataTables, File;

class PrestasiController
{
    public function index()
    {
      $data = DB::table('prestasi')
      ->join('bidang_keahlian as b', 'prestasi.id_bidang_keahlian', '=', 'b.id')
      ->select('prestasi.*', 'b.nama_bk')
      ->orderBy('id', 'desc')
      ->get();
      return Datatables::of($data)
      ->addIndexColumn()
      ->addColumn('aksi', function($row){
          $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn-edit-prestasi" style="font-size: 18pt; text-decoration: none;" class="mr-3">
          <i class="fas fa-pen-square"></i>
          </a>';
          $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama.'" class="btn-delete-prestasi" style="font-size: 18pt; text-decoration: none; color:red;">
          <i class="fas fa-trash"></i>
          </a>';
          return $btn;
        })
      ->rawColumns(['aksi'])
      ->make(true);
    }

    public function store(Request $request)
    {
      $namaKejuaraan = $request->nama_kejuaraan;
      $nama = $request->nama;
      $peringkat = $request->peringkat;
      $tahun = $request->tahun;
      $bk = $request->bk;
      $gambar = $request->file('gambar');
      if($gambar != null) {
        $fileEx = $gambar->getClientOriginalName();
        $fileArr = explode(".", $fileEx);
        $panjangArray = count($fileArr);
        $indexTerakhir = $panjangArray - 1;
        if($this->checkGambar($fileArr[$indexTerakhir])) {
          $gambarName = time().'_'.$fileEx;
          $gambarPath = "img/prestasi";
          $gambar->move($gambarPath, $gambarName, "public");

          $prestasi = new Prestasi;
          $prestasi->gambar = $gambarPath.'/'.$gambarName;
          $prestasi->nama_kejuaraan = $namaKejuaraan;
          $prestasi->peringkat = $peringkat;
          $prestasi->nama = $nama;
          $prestasi->id_bidang_keahlian = $bk;
          $prestasi->tahun = $tahun;
          $prestasi->save();

          $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Tambah";
                    $history->keterangan = "Menambahkan Prestasi '".$namaKejuaraan."'";
                    $history->save();

          if($prestasi) {
            return response()->json([
              'status' => 'ok'
            ]);
          }
        } else {
          return response()->json([
            'status' => 'image_not_valid'
          ]);
        }

      } else {
        return response()->json([
          'status' => 'empty_image'
        ]);
      }

    }

    public function loadTable()
    {
      return view('datatable.profile.tablePrestasi');
    }

    public function edit($id)
    {
      $data = Prestasi::find($id);
      return response()->json([
        'data' => $data
      ]);
    }

    public function update(Request $request, $id)
    {
      $namaKejuaraan = $request->nama_kejuaraan;
      $nama = $request->nama;
      $peringkat = $request->peringkat;
      $tahun = $request->tahun;
      $bk = $request->bk;
      $gambar = $request->file('gambar');
      if($gambar != null) {
        $fileEx = $gambar->getClientOriginalName();
        $fileArr = explode(".", $fileEx);
        $panjangArray = count($fileArr);
        $indexTerakhir = $panjangArray - 1;
        if($this->checkGambar($fileArr[$indexTerakhir])) {

          $gambarName = time().'_'.$fileEx;
          $gambarPath = "img/prestasi";
          $gambar->move($gambarPath, $gambarName, "public");

          $pathDelete = Prestasi::where('id', $id)->value('gambar');
          File::delete($pathDelete);

          $prestasi = Prestasi::find($id);

            if($prestasi->nama_kejuaraan != $namaKejuaraan){
                $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Prestasi '".$prestasi->nama_kejuaraan."' menjadi '".$namaKejuaraan."'";
                    $history->save();
            }
            if($prestasi->peringkat != $peringkat){
                $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Peringkat Prestasi '".$prestasi->nama_kejuaraan."'";
                    $history->save();
            }
            if($prestasi->nama != $nama){
                $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Nama Prestasi '".$prestasi->nama_kejuaraan."'";
                    $history->save();
            }
            if($prestasi->id_bidang_keahlian != $bk){
                $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit BK Prestasi '".$prestasi->nama_kejuaraan."'";
                    $history->save();
            }
            if($prestasi->tahun != $tahun){
                $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Tahun Prestasi '".$prestasi->nama_kejuaraan."'";
                    $history->save();
            }
            if($prestasi->gambar != $gambarPath.'/'.$gambarName){
                $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Gambar Prestasi '".$prestasi->nama_kejuaraan."'";
                    $history->save();
            }

          $prestasi->gambar = $gambarPath.'/'.$gambarName;
          $prestasi->nama_kejuaraan = $namaKejuaraan;
          $prestasi->peringkat = $peringkat;
          $prestasi->nama = $nama;
          $prestasi->id_bidang_keahlian = $bk;
          $prestasi->tahun = $tahun;
          $prestasi->save();

          if($prestasi) {
            return response()->json([
              'status' => 'ok'
            ]);
          }
        } else {
          return response()->json([
            'status' => 'image_not_valid'
          ]);
        }

      } else {
        $prestasi = Prestasi::find($id);
        if($prestasi->nama_kejuaraan != $namaKejuaraan){
            $history = new Histori;
                $history->nama = auth()->user()->name;
                $history->aksi = "Edit";
                $history->keterangan = "Mengedit Prestasi '".$prestasi->nama_kejuaraan."' menjadi '".$namaKejuaraan."'";
                $history->save();
        }
        if($prestasi->peringkat != $peringkat){
            $history = new Histori;
                $history->nama = auth()->user()->name;
                $history->aksi = "Edit";
                $history->keterangan = "Mengedit Peringkat Prestasi '".$prestasi->nama_kejuaraan."'";
                $history->save();
        }
        if($prestasi->nama != $nama){
            $history = new Histori;
                $history->nama = auth()->user()->name;
                $history->aksi = "Edit";
                $history->keterangan = "Mengedit Nama Prestasi '".$prestasi->nama_kejuaraan."'";
                $history->save();
        }
        if($prestasi->id_bidang_keahlian != $bk){
            $history = new Histori;
                $history->nama = auth()->user()->name;
                $history->aksi = "Edit";
                $history->keterangan = "Mengedit BK Prestasi '".$prestasi->nama_kejuaraan."'";
                $history->save();
        }
        if($prestasi->tahun != $tahun){
            $history = new Histori;
                $history->nama = auth()->user()->name;
                $history->aksi = "Edit";
                $history->keterangan = "Mengedit Tahun Prestasi '".$prestasi->nama_kejuaraan."'";
                $history->save();
        }
        $prestasi->nama_kejuaraan = $namaKejuaraan;
        $prestasi->peringkat = $peringkat;
        $prestasi->nama = $nama;
        $prestasi->id_bidang_keahlian = $bk;
        $prestasi->tahun = $tahun;
        $prestasi->save();
        if($prestasi) {
          return response()->json([
            'status' => 'ok'
          ]);
        }
      }
    }

    public function destroy($id)
    {
      $pathDelete = Prestasi::where('id', $id)->value('gambar');
      File::delete($pathDelete);

      $prestasi = Prestasi::find($id);
      $history = new Histori;
      $history->nama = auth()->user()->name;
      $history->aksi = "Hapus";
      $history->keterangan = "Menghapus Prestasi '".$prestasi->nama_kejuaraan."'";
      $history->save();

      Prestasi::destroy($id);
      return response()->json([
        'status' => 'deleted'
      ]);
    }

    public function getBK()
    {
      $data = BK::orderBy('id', 'desc')->get();
      return response()->json([
        'data' => $data
      ]);
    }

    function checkGambar($file)
    {
      $file = strtolower($file);
      $ex = array("png","jpg","jpeg","svg","gif");
      if(in_array($file, $ex)) {
        return true;
      }
      return false;
    }

    function getDataPrestasi(){
      $bk = Bidang_keahlian::orderBy('nama_bk')->get();
      $items = array();
      foreach($bk as $bidang) {
      $items[$bidang->nama_bk] = DB::table('prestasi')
      ->join('bidang_keahlian as b', 'prestasi.id_bidang_keahlian', '=', 'b.id')
      ->select('prestasi.*', 'b.nama_bk')
      ->where('b.id',$bidang->id)
      ->get();
      }
      // print_r($items);
      return view('user.Profile/prestasi',['bk'=>$bk,'data'=>$items]);
    }
}
