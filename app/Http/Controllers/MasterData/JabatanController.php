<?php

namespace App\Http\Controllers\MasterData;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use \App\Jabatan;
use \App\Histori;
use DataTables;
use Validator;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.MasterData.jabatanAdmin');
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
        $validator = Validator::make($request->all(),[
            'nama_jabatan' => 'required|string'
        ]);
        if($validator->fails()) {
            return response([
                'message' => 'gagal'
            ]);
        }

        $history = new Histori;
        $history->nama = auth()->user()->name;
        $history->aksi = "Tambah";
        $history->keterangan = "Menambahkan Jabatan '".$request->nama_jabatan."'";
        $history->save();

        $jabatan = new Jabatan;
        $jabatan->nama_jabatan = $request->nama_jabatan;
        $jabatan->save();

        return response()->json([
            'message' => 'success'
        ]);
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
        //
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
        $validator = Validator::make($request->all(),[
            'nama_jabatan_edit' => 'required|string'
        ]);
        if($validator->fails()) {
            return response([
                'message' => 'gagal'
            ]);
        }

        $j = Jabatan::find($id);
        $history = new Histori;
        $history->nama = auth()->user()->name;
        $history->aksi = "Edit";
        $history->keterangan = "Mengedit Jabatan '".$j->nama_jabatan."' menjadi '".$request->nama_jabatan_edit."'";
        $history->save();

        $jabatan = Jabatan::find($id);
        $jabatan->nama_jabatan = $request->nama_jabatan_edit;
        $jabatan->save();

        return response()->json([
            'message' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $j = Jabatan::find($id);
        $history = new Histori;
        $history->nama = auth()->user()->name;
        $history->aksi = "Hapus";
        $history->keterangan = "Menghapus Jabatan '".$j->nama_jabatan;
        $history->save();

        $jabatan = Jabatan::find($id);
        $jabatan->delete();

        return response()->json([
            "message" => "success"
        ]);
    }

    public function LoadTableJabatan(){
        return view('datatable.TableJabatan');
    }

    public function LoadDataJabatan(){
        $jabatan = Jabatan::orderBy('id','desc')->get();

            return Datatables::of($jabatan)->addIndexColumn()
            ->addColumn('aksi', function($row){
                $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama_jabatan.'" class="btn-edit-jabatan" style="font-size: 18pt; text-decoration: none;" class="mr-3">
                <i class="fas fa-pen-square"></i>
                </a>';
                $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama_jabatan.'" class="btn-delete-jabatan" style="font-size: 18pt; text-decoration: none; color:red;">
                <i class="fas fa-trash"></i>
                </a>';
                return $btn;
         })
         ->rawColumns(['aksi'])
            ->make(true);
    }
}
