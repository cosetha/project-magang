<?php

namespace App\Http\Controllers\MasterData;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Bidang_keahlian;
use App\Histori;
use DataTables;
use Illuminate\Support\Facades\Storage;
use Validator;
class BidangKeahlianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/MasterData/bidangkeahlianAdmin');
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
        $messsages = array(
            'deskripsi.required'=>'Field Deskripsi Perlu di Isi',
            'gambar.required'=>'Field Gambar Perlu di Isi',
            'gambar.mimes'=>'Field Gambar Perlu di Isi dengan Format: jpeg,jpg,png',
            'nama.required'=>'Field Nama Perlu di Isi',
        );
        $validator = Validator::make($request->all(),[
            'nama' => 'required|string',
            'gambar' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            "deskripsi" => 'required|string'],$messsages);
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return response()->json([
                'error' => $error,
              ]);
         }else{
             try {
                if($request->hasFile('gambar')){
                    $directory = 'assets/upload/thumbnail';
                    $file = request()->file('gambar');
                    $nama = time().$file->getClientOriginalName();
                    $file->name = $nama;
                    $file->move($directory, $file->name);
                    $bk = new Bidang_keahlian;
                    $bk->nama_bk = $request->nama;
                    $bk->deskripsi = $request->deskripsi;
                    $bk->gambar= $directory."/".$nama;
                    $bk->save();

                    $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Tambah";
                    $history->keterangan = "Menambahkan BK '".$request->nama."'";
                    $history->save();

                    return response()->json([
                        'message' => 'success'
                    ]);
                }
             } catch (\Exception $e) {

             }
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
        $data = Bidang_keahlian::find($id);

        if($data !=null){
            $res['message'] = "Success!";
            $res['values'] = $data;
            return response($res);
        }
        else{
            $res['message'] = "Empty!";
            return response($res);
        }
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
        if($request->hasFile('gambar')){
            $messsages = array(
                'deskripsi.required'=>'Field Deskripsi Perlu di Isi',
                'gambar.required'=>'Field Gambar Perlu di Isi',
                'gambar.mimes'=>'Field Gambar Perlu di Isi dengan Format: jpeg,jpg,png',
                'nama.required'=>'Field Nama Perlu di Isi',
            );

            $validator = Validator::make($request->all(),[
                'nama' => 'required|string',
                'gambar' => 'mimes:jpeg,jpg,png,gif|max:10000',
                "deskripsi" => 'required|string',
            ],$messsages);
            if ($validator->fails()) {
                $error = $validator->errors()->first();
                return response()->json([
                    'error' => $error,
                  ]);
             }else{
                $directory = 'assets/upload/thumbnail';
                $file = request()->file('gambar');
                $nama_file = time().$file->getClientOriginalName();
                $file->name = $nama_file;
                $file->move($directory, $file->name);


                $bk = Bidang_keahlian::find($id);
                if($bk->nama_bk != $request->nama){
                    $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit BK '".$bk->nama_bk."' menjadi '".$request->nama."'";
                    $history->save();
                }
                if($bk->deskripsi != $request->deskripsi){
                    $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Deskripsi BK '".$bk->nama_bk;
                    $history->save();
                }
                if($bk->gambar != $directory."/".$nama_file){
                    $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Gambar BK '".$bk->nama_bk."'";
                    $history->save();
                }
                try {
                    unlink($bk->gambar);
                } catch (\Throwable $th) {
                    echo($th);
               }

                $bk->nama_bk = $request->nama;
                $bk->deskripsi = $request->deskripsi;
                $bk->gambar= $directory."/".$nama_file;
                $bk->save();

                return response()->json([
                    'message' => 'success'
                ]);
             }
        }else{
            $messsages = array(
                'deskripsi.required'=>'Field Deskripsi Perlu di Isi',
                'nama.required'=>'Field Nama Perlu di Isi',
            );

            $validator = Validator::make($request->all(),[
                'nama' => 'required|string',
                "deskripsi" => 'required|string',
            ],$messsages);
            if ($validator->fails()) {
                $error = $validator->errors()->first();
                return response()->json([
                    'error' => $error,
                  ]);
             }else{
            $bk = Bidang_keahlian::find($id);
            if($bk->nama_bk != $request->nama){
                $history = new Histori;
                $history->nama = auth()->user()->name;
                $history->aksi = "Edit";
                $history->keterangan = "Mengedit BK '".$bk->nama_bk."' menjadi '".$request->nama."'";
                $history->save();
            }
            if($bk->deskripsi != $request->deskripsi){
                $history = new Histori;
                $history->nama = auth()->user()->name;
                $history->aksi = "Edit";
                $history->keterangan = "Mengedit Deskripsi BK '".$bk->nama_bk;
                $history->save();
            }
            $bk->nama_bk = $request->nama;
            $bk->deskripsi = $request->deskripsi;
            $bk->save();
            return response()->json([
                'message' => 'success'
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
        $bk = Bidang_keahlian::find($id);
        $history = new Histori;
        $history->nama = auth()->user()->name;
        $history->aksi = "Hapus";
        $history->keterangan = "Menghapus BK '".$bk->nama_bk."'";
        $history->save();
        try {
            unlink($bk->gambar);
        } catch (\Throwable $th) {
            echo($th);
        }
        $bk->delete();

        return response()->json([
            "message" => "success"
        ]);
    }

    public function LoadTableBK(){
        return view('datatable.TableBK');
    }

    public function LoadDataBK(){
        $jabatan = Bidang_keahlian::orderBy('id','desc')->get();

            return Datatables::of($jabatan)->addIndexColumn()
            ->addColumn('aksi', function($row){
                $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama_bk.'" class="btn-edit-bk" style="font-size: 18pt; text-decoration: none;" class="mr-3">
                <i class="fas fa-pen-square"></i>
                </a>';
                $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama_bk.'" class="btn-delete-bk" style="font-size: 18pt; text-decoration: none; color:red;">
                <i class="fas fa-trash"></i>
                </a>';
                $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama_bk.'" class="btn-show-bk" style="font-size: 18pt; text-decoration: none; color:green;">
                <i class="fas fa-eye"></i>
                </a>';
                return $btn;
         })
         ->rawColumns(['aksi'])
            ->make(true);
    }

    public function storeImg()
    {
        $directory = 'assets/upload/images';
        $file = request()->file('file');
        $old = $file->getClientOriginalName();
        $nama = time().$file->getClientOriginalName();
        $file->name = $nama;
        $file->move($directory, $file->name);
        return response()->json(['location' => $directory."/".$nama,'alt'=>$old]);

    }
}
