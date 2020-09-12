<?php

namespace App\Http\Controllers\Akademik;

use Illuminate\Http\Request;
use DataTables, File;
use App\Dokumen;
use App\Histori;

class DokumenController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = Dokumen::orderBy('id', 'desc')->get();
      return Datatables::of($data)
      ->addIndexColumn()
      ->addColumn('aksi', function($row){
          $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn-edit-dokumen" style="font-size: 18pt; text-decoration: none;" class="mr-3">
          <i class="fas fa-pen-square"></i>
          </a>';
          $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn-delete-dokumen" style="font-size: 18pt; text-decoration: none; color:red;">
          <i class="fas fa-trash"></i>
          </a>';
          return $btn;
        })
        ->addColumn('file_dokumen', function($row){
            $file = '<a href="'.$row->file.'" >'.$row->file.'</a>';
            return $file;
          })
      ->rawColumns(['aksi', 'file_dokumen'])
      ->make(true);
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
        // $validatedData = $request->validateWithBag('post', [
        //     // 'title' => ['required', 'unique:posts', 'max:255'],
        //     'file' => 'required|max:10000|mimes:doc,docx,pdf,xls,xlsx'
        // ]);

        $file = $request->file('file');
        $namaOriFile = $file->getClientOriginalName();
        $fileName = time().'_'.$namaOriFile;
        $filePath = "file/dokumen";
        $file->move($filePath, $fileName, "public");

        $dokumen = new Dokumen;
        $dokumen->nama_dokumen = $nama;
        $dokumen->file = $filePath.'/'.$fileName;
        $dokumen->save();

        $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Tambah";
                    $history->keterangan = "Menambahkan Dokumen '".$nama."'";
                    $history->save();
        if($dokumen) {
          return response()->json([
            'status' => 'ok'
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
        $dokumen = Dokumen::find($id);
        return response()->json([
          'data' => $dokumen
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
      $file = $request->file('file');
      if($file != null) {
        $namaOriFile = $file->getClientOriginalName();
        $fileName = time().'_'.$namaOriFile;
        $filePath = "file/dokumen";
        $file->move($filePath, $fileName, "public");
        $fileDelete = Dokumen::find($id)->value('file');
        File::delete($fileDelete);

        $dokumen = Dokumen::find($id);
        if($dokumen->nama_dokumen != $nama){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Dokumen '".$dokumen->nama_dokumen."' menjadi '".$nama."'";
                    $history->save();
        }
        if($dokumen->file != $filePath.'/'.$fileName){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit File Dokumen '".$nama."'";
                    $history->save();
        }
        $dokumen->nama_dokumen = $nama;
        $dokumen->file = $filePath.'/'.$fileName;
        $dokumen->save();
        if($dokumen) {
          return response()->json([
            'status' => 'ok'
          ]);
        }
      } else {
        $dokumen = Dokumen::find($id);
        if($dokumen->nama_dokumen != $nama){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Dokumen '".$dokumen->nama_dokumen."' menjadi '".$nama."'";
                    $history->save();
        }
        $dokumen->nama_dokumen = $nama;
        $dokumen->save();
        if($dokumen) {
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
        $fileDelete = Dokumen::where('id', $id)->value('file');
        File::delete($fileDelete);

        $d = Dokumen::find($id);
        $history = new Histori;
        $history->nama = auth()->user()->name;
        $history->aksi = "Hapus";
        $history->keterangan = "Menghapus BK '".$d->nama_dokumen."'";
        $history->save();

        Dokumen::destroy($id);
        return response()->json([
          'status' => 'deleted'
        ]);
    }

    public function loadTable()
    {
      return view('datatable.akademik.tableDokumen');
    }
}
