<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jabatan;
use App\TenagaKependidikan as TK;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TenagaImport;
use App\Exports\TenagaExport;
use DataTables, File, PDF;

class TenagaKependidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = DB::table('tenaga_kependidikan as tng')
      ->join('jabatan as j', 'tng.kode_jabatan', '=', 'j.id')
      ->select('tng.*', 'j.nama_jabatan')
      ->orderBy('id', 'desc')
      ->get();
      // $data = TenagaKependidikan::orderBy('id', 'desc')->get();
      return Datatables::of($data)
      ->addIndexColumn()
      ->addColumn('aksi', function($row){
          $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn-edit-tenaga_kependidikan" style="font-size: 18pt; text-decoration: none;" class="mr-3">
          <i class="fas fa-pen-square"></i>
          </a>';
          $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn-delete-tenaga_kependidikan" style="font-size: 18pt; text-decoration: none; color:red;">
          <i class="fas fa-trash"></i>
          </a>';
          return $btn;
        })
      ->rawColumns(['aksi'])
      ->make(true);
    }

    public function loadTable()
    {
      return view('datatable.profile.tableTenaga');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $nama = $request->nama;
      $alamat = $request->alamat;
      $telepon = $request->telepon;
      $jabatan = $request->jabatan;
      $gambar = $request->file('gambar');
      if($gambar != null) {
        $fileEx = $gambar->getClientOriginalName();
        $fileArr = explode(".", $fileEx);
        $panjangArray = count($fileArr);
        $indexTerakhir = $panjangArray - 1;
        if($this->checkGambar($fileArr[$indexTerakhir])) {
          $gambarName = time().'_'.$fileEx;
          $gambarPath = "img/tenaga";
          $gambar->move($gambarPath, $gambarName, "public");

          $tenaga = new TK;
          $tenaga->gambar = $gambarPath.'/'.$gambarName;
          $tenaga->nama = $nama;
          $tenaga->kode_jabatan = $jabatan;
          $tenaga->alamat = $alamat;
          $tenaga->no_tlp = $telepon;
          $tenaga->save();

          if($tenaga) {
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $data = DB::table('tenaga_kependidikan as tng')
      ->where('tng.id', $id)
      ->join('jabatan as j', 'tng.kode_jabatan', '=', 'j.id')
      ->select('tng.*', 'j.nama_jabatan')
      ->orderBy('id', 'desc')
      ->get();

      return response()->json([
        'status' => 'ok',
        'data' => $data
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $nama = $request->nama;
      $alamat = $request->alamat;
      $telepon = $request->telepon;
      $jabatan = $request->jabatan;
      $gambar = $request->file('gambar');
      if($gambar != null) {
        $fileEx = $gambar->getClientOriginalName();
        $fileArr = explode(".", $fileEx);
        $panjangArray = count($fileArr);
        $indexTerakhir = $panjangArray - 1;
        if($this->checkGambar($fileArr[$indexTerakhir])) {
          $gambarDelete = TK::find($id)->value('gambar');
          File::delete($gambarDelete);
          $gambarName = time().'_'.$fileEx;
          $gambarPath = "img/tenaga";
          $gambar->move($gambarPath, $gambarName, "public");

          $tenaga = TK::find($id);
          $tenaga->gambar = $gambarPath.'/'.$gambarName;
          $tenaga->nama = $nama;
          $tenaga->kode_jabatan = $jabatan;
          $tenaga->alamat = $alamat;
          $tenaga->no_tlp = $telepon;
          $tenaga->save();

          if($tenaga) {
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

        $tenaga = TK::find($id);
        $tenaga->nama = $nama;
        $tenaga->kode_jabatan = $jabatan;
        $tenaga->alamat = $alamat;
        $tenaga->no_tlp = $telepon;
        $tenaga->save();

        if($tenaga) {
          return response()->json([
            'status' => 'ok'
          ]);
        }
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $gambarDelete = TK::where('id', $id)->value('gambar');
      File::delete($gambarDelete);
        $tenaga = TK::destroy($id);
          return response()->json([
            'status' => 'ok'
          ]);
    }

    public function getJabatan()
    {
      $data = Jabatan::orderBy('id', 'desc')->get();
      return response()->json([
        'jb' => $data
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

    public function importExcel(Request $request)
    {
  		$this->validate($request, [
  			'file' => 'required|mimes:csv,xls,xlsx'
  		]);

  		$file = $request->file('file');

  		// import data
  		Excel::import(new TenagaImport, $file);
      return response()->json([
        'status' => 'ok'
      ]);
  		// return redirect('/tenaga');
    }

    public function exportExcel()
    {
        return Excel::download(new TenagaExport, 'tenaga kependidikan.xlsx');
    }

    public function exportPDF(){
        $data = DB::table('tenaga_kependidikan as tng')
        ->join('jabatan as j', 'tng.kode_jabatan', '=', 'j.id')
        ->select('tng.*', 'j.nama_jabatan')
        ->orderBy('id', 'desc')
        ->get();
        $pdf = PDF::loadview('PDF/TenagaKependidikanPDF',['tenaga'=>$data]);
	    return $pdf->download('Tenaga Kependidikan.pdf');
    }

    public function download_excel(){

      return response()->download('EXCEL/TenagaKerja/example-tenaga-kerja.xlsx');
    }
}
