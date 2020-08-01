<?php

namespace App\Http\Controllers;

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
        $imgpath = request()->file('gambar')->store('image', 'public');
        $bk = new Bidang_keahlian;
        $bk->nama_bk = $request->nama;
        $bk->deskripsi = $request->deskripsi;
        $bk->akreditasi=$request->akreditasi;
        $bk->gambar='/storage/' . $imgpath;
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
            $bk = Bidang_keahlian::find($id);
            $path = str_replace('/storage', '', $bk->gambar);;
            Storage::delete('/public'.$path);
            $bk->nama_bk = $request->nama;
            $bk->deskripsi = $request->deskripsi;
            $bk->akreditasi=$request->akreditasi;
            $imgpath = request()->file('gambar')->store('image', 'public');
            $bk->gambar='/storage/' . $imgpath;
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
        $path = str_replace('/storage', '', $bk->gambar);;
        Storage::delete('/public'.$path);
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
    //     $directory = 'assets/upload';
    //     $file = request()->file('file');
    //     $file->move($directory, $file->getClientOriginalName());
    //     return response()->json(['location' => $directory."/".$file->getClientOriginalName()]);
    // }
    $imgpath = request()->file('file')->store('image', 'public');
    return response()->json(['location' => '/storage/' . $imgpath]);
    }
}
