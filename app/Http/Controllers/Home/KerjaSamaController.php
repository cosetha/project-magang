<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DataTables;
use Validator;
use App\KerjaSama;

class KerjaSamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/Home/kerjasamaAdmin');
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
            'link' => 'required|string|min:1|max:255',
            'gambar' => 'mimes:jpeg,jpg,png,gif|required',
            "caption" => 'required|string',
            "perusahaan" => 'required|string']);
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return response()->json([
                'error' => $error,
              ]);
         }else{
            try {
                $directory = 'assets/upload/thumbnail';
                $file = request()->file('gambar');
                $nama = time().$file->getClientOriginalName();
                $file->name = $nama;
                $file->move($directory, $file->name);
                $kerjasama = new KerjaSama;
                $kerjasama->perusahaan = $request->perusahaan;
                $kerjasama->link = $request->link;
                $kerjasama->caption = $request->caption;
                $kerjasama->gambar= $directory."/".$nama;
                $kerjasama->save();
    
                return response()->json([
                    'message' => 'Success'
                ]);
            } catch (\Exception $e) {
               
                return response()->json([
                    'error' => $e->getMessage()
                ]);
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
        $data = KerjaSama::find($id);

        if($data !=null){
            return response()->json([
                "message" => "Succes",
                "values" => $data,
            ]);
        }
        else{
            return response()->json([
                "message" => "Empty"
            ]);
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
        $validator = Validator::make($request->all(),[
            'link' => 'required|string|min:1|max:255',
            'gambar' => 'mimes:jpeg,jpg,png,gif',
            "caption" => 'required|string',
            "perusahaan" => 'required|string']);
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return response()->json([
                'error' => $error,
              ]);
         }else{
            if($request->hasFile('gambar')){

                $directory = 'assets/upload/thumbnail';
                $file = request()->file('gambar');
                $nama_file = time().$file->getClientOriginalName();
                $file->name = $nama_file;
                $file->move($directory, $file->name);
    
    
                $kerjasama = KerjaSama::find($id);
                try {
                    unlink($kerjasama->gambar);
                } catch (\Throwable $th) {
                    echo($th);
                }
    
                $kerjasama->perusahaan = $request->perusahaan;
                $kerjasama->link = $request->link;
                $kerjasama->caption = $request->caption;
                $kerjasama->gambar= $directory."/".$nama_file;
                $kerjasama->save();
    
                return response()->json([
                    'message' => 'Success'
                ]);
            }else{
                $kerjasama = KerjaSama::find($id);
                $kerjasama->perusahaan = $request->perusahaan;
                $kerjasama->link = $request->link;
                $kerjasama->caption = $request->caption;
                $kerjasama->save();
                return response()->json([
                    'message' => 'Success'
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
        try {
            $kerjasama = KerjaSama::find($id);
            try {
                unlink($kerjasama->gambar);
            } catch (\Throwable $th) {
                echo($th);
            }
            $kerjasama->delete();
            return response()->json([
                "message" => "Success"
            ]);
            //code...
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }
    public function LoadTableKerjaSama(){
        return view('datatable.TableKerjaSama');
    }

    public function LoadDataKerjaSama(){
        $headline = KerjaSama::orderBy('id','desc')->get();
            return Datatables::of($headline)->addIndexColumn()
            ->addColumn('aksi', function($row){
                $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->perushaan.'" class="btn-edit-kerjasama" style="font-size: 18pt; text-decoration: none;" class="mr-3">
                <i class="fas fa-pen-square"></i>
                </a>';
                $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->perusahaan.'" class="btn-delete-kerjasama" style="font-size: 18pt; text-decoration: none; color:red;">
                <i class="fas fa-trash"></i>
                </a>';
                return $btn;
         })
         ->rawColumns(['aksi'])
            ->make(true);
    }
}
