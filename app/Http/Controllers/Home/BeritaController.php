<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Berita;
use DataTables;
use Illuminate\Support\Facades\DB;
use File;

class BeritaController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $data = Berita::orderBy('id', 'desc')->get();
      $data = DB::table('berita')
      ->join('users as u', 'berita.id_penulis', '=', 'u.id')
      ->select('berita.*', 'u.name')
      ->orderBy('id', 'desc')
      ->get();
      return Datatables::of($data)
      ->addIndexColumn()
      ->addColumn('aksi', function($row){
          $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn-edit-berita" style="font-size: 18pt; text-decoration: none;" class="mr-3">
          <i class="fas fa-pen-square"></i>
          </a>';
          $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->judul.'" class="btn-delete-berita" style="font-size: 18pt; text-decoration: none; color:red;">
          <i class="fas fa-trash"></i>
          </a>';
          return $btn;
        })
      ->rawColumns(['aksi'])
      ->make(true);
    }

    public function loadTable()
    {
      return view('datatable.home.tableBerita');
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
      $judul = $request->judul;
      $deskripsi = $request->deskripsi;
      $penulis = $request->penulis;
      $gambar = $request->file('gambar');
      if($gambar != null) {
      $fileEx = $gambar->getClientOriginalName();
      $fileArr = explode(".", $fileEx);

      if($this->checkGambar($fileArr[1])) {
        $gambarName = time().'_'.$fileEx;
        $gambarPath = "img/berita";
        $gambar->move($gambarPath, $gambarName, "public");

        $berita = new Berita;
        $berita->judul = $judul;
        $berita->gambar = $gambarPath."/".$gambarName;
        $berita->deskripsi = $deskripsi;
        $berita->id_penulis = $penulis;
        $berita->save();

        if($berita) {
          return response()->json([
            'status' => 'ok'
          ]);
        } else {
          return response()->json([
            'status' => 'no'
          ]);
        }
      } else {
        return response()->json([
          'status' => 'not_valid'
        ]);
      }
    } else {
      return response()->json([
        'status' => 'not_valid'
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
        $data = Berita::find($id);

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
      $judul = $request->judul;
      $deskripsi = $request->deskripsi;
      $penulis = $request->penulis;
      $gambar = $request->file('gambar');
      if($gambar != null) {
        $fileEx = $gambar->getClientOriginalName();
        $fileArr = explode(".", $fileEx);

        if($this->checkGambar($fileArr[1])) {
          $gambarName = time().'_'.$fileEx;
          $gambarPath = "img/berita";
          $gambarPathDel = Berita::find($id)->value('gambar');
          File::delete($gambarPathDel);
          $gambar->move($gambarPath, $gambarName, "public");

          $berita = Berita::find($id);
          $berita->judul = $judul;
          $berita->gambar = $gambarPath."/".$gambarName;
          $berita->deskripsi = $deskripsi;
          // $berita->id_penulis = $penulis;
          $berita->save();

          if($berita) {
            return response()->json([
              'status' => 'ok'
            ]);
          } else {
            return response()->json([
              'status' => 'no'
            ]);
          }
        } else {
          return response()->json([
            'status' => 'not_valid'
          ]);
        }
      } else {
        $berita = Berita::find($id);
        $berita->judul = $judul;
        $berita->deskripsi = $deskripsi;
        $berita->id_penulis = $penulis;
        $berita->save();

        if($berita) {
          return response()->json([
            'status' => 'ok'
          ]);
        } else {
          return response()->json([
            'status' => 'no'
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
      $gambarPath = Berita::find($id)->value('gambar');
      File::delete($gambarPath);

        $del = Berita::find($id);
        $del->delete();
        return response()->json([
          'status' => 'deleted'
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
}
