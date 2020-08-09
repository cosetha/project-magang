<?php

namespace App\Http\Controllers\MasterData;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Bidang_keahlian;
use DataTables;
use Illuminate\Support\Facades\Storage;
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
        if($request->hasFile('gambar')){
            $directory = 'assets/upload/thumbnail';
            $file = request()->file('gambar');
            $nama = time().$file->getClientOriginalName();
            $file->name = $nama;
            $file->move($directory, $file->name);
            $bk = new Bidang_keahlian;
            $bk->nama_bk = $request->nama;
            $bk->deskripsi = $request->deskripsi;
            $bk->akreditasi= $request->akreditasi;
            $bk->gambar= $directory."/".$nama;
            $bk->save();

        return response()->json([
            'message' => 'success'
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

            $directory = 'assets/upload/thumbnail';
            $file = request()->file('gambar');
            $nama_file = time().$file->getClientOriginalName();
            $file->name = $nama_file;
            $file->move($directory, $file->name);


            $bk = Bidang_keahlian::find($id);
            try {
                unlink($bk->gambar);
            } catch (\Throwable $th) {
                echo($th);
            }

            $bk->nama_bk = $request->nama;
            $bk->deskripsi = $request->deskripsi;
            $bk->akreditasi=$request->akreditasi;

            $bk->gambar= $directory."/".$nama_file;
            $bk->save();

            return response()->json([
                'message' => 'success'
            ]);
        }else{
            $bk = Bidang_keahlian::find($id);
            $bk->nama_bk = $request->nama;
            $bk->deskripsi = $request->deskripsi;
            $bk->akreditasi=$request->akreditasi;
            $bk->save();
        }
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
        $bk = Bidang_keahlian::find($id);
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
