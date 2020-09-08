<?php

namespace App\Http\Controllers\Kemahasiswaan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lowongan;
use DataTables;
use Illuminate\Support\Facades\Storage;
use Validator;

class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $jenis = array(
        array('value' => 'kerja','alt' =>'Lowongan Kerja'),
        array('value' => 'internship','alt'=>'Lowongan Magang/Internship'));
        return view('admin.Kemahasiswaan/lowonganAdmin',['data'=>$jenis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'jenis.required'=>'Field Jenis Perlu d Isi'
        );
        $validator = Validator::make($request->all(),[
            'gambar' => 'mimes:jpeg,jpg,png,gif|required',
            'nama' => 'required',
            "deskripsi" => 'required',
            "jenis" => 'required'],$messsages
        );
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

                $lowongan = new Lowongan;
                $lowongan->nama_lowongan = $request->nama;
                $lowongan->deskripsi = $request->deskripsi;
                $lowongan->jenis = $request->jenis;
                $lowongan->gambar = $directory."/".$nama;
                $lowongan->save();
    
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
        $data = Lowongan::find($id);
        if($data !=null){
            return response()->json([
                "message" => "Succes",
                "values" => $data,
            ]);
        }
        else{
            return response()->json([
                "error" => "Empty"
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
        $messsages = array(
            'deskripsi.required'=>'Field Deskripsi Perlu di Isi',
            'gambar.required'=>'Field Gambar Perlu di Isi',
            'gambar.mimes'=>'Field Gambar Perlu di Isi dengan Format: jpeg,jpg,png',
            'nama.required'=>'Field Nama Perlu di Isi',
            'jenis.required'=>'Field Jenis Perlu d Isi'
        );
        $validator = Validator::make($request->all(),[
            'gambar' => 'mimes:jpeg,jpg,png,gif',
            'nama' => 'required',
            "deskripsi" => 'required',
            "jenis" => 'required'],$messsages
        );
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
                    $nama_file = time().$file->getClientOriginalName();
                    $file->name = $nama_file;
                    $file->move($directory, $file->name);
        
        
                    $lowongan = Lowongan::find($id);
                    try {
                        unlink($lowongan->gambar);
                    } catch (\Throwable $th) {
                        echo($th);
                    }
        
                    $lowongan->nama_lowongan = $request->nama;
                    $lowongan->deskripsi = $request->deskripsi;
                    $lowongan->jenis=$request->jenis;
        
                    $lowongan->gambar= $directory."/".$nama_file;
                    $lowongan->save();
        
                    return response()->json([
                        'message' => 'success'
                    ]);
                }else{
                    $lowongan = Lowongan::find($id);
                    $lowongan->nama_lowongan = $request->nama;
                    $lowongan->deskripsi = $request->deskripsi;
                    $lowongan->jenis=$request->jenis;
                    $lowongan->save();
                }
                
            } catch (\Exception $e) {
               
                return response()->json([
                    'error' => $e->getMessage()
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
            $lowongan = Lowongan::find($id);
            try {
                unlink($lowongan->gambar);
            } catch (\Throwable $th) {
                echo($th);
            }
            $lowongan->delete();
            return response()->json([
                "message" => "Success"
            ]);
            } catch (\Exception $e) {
                return response()->json([
                    'error' => $e->getMessage()
                ]);
        }
    }
    public function LoadTableLowongan(){
        return view('datatable.kemahasiswaan.TableLowongan');
    }

    public function LoadDataLowongan(){
        $headline = Lowongan::orderBy('id','desc')->get();
            return Datatables::of($headline)->addIndexColumn()
            ->addColumn('aksi', function($row){
                $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama_lowongan.'" class="btn-edit-lowongan" style="font-size: 18pt; text-decoration: none;" class="mr-3">
                <i class="fas fa-pen-square"></i>
                </a>';
                $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama_lowongan.'" class="btn-delete-lowongan" style="font-size: 18pt; text-decoration: none; color:red;">
                <i class="fas fa-trash"></i>
                </a>';
                $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama_lowongan.'" class="btn-show-lowongan" style="font-size: 18pt; text-decoration: none; color:green;">
                <i class="fas fa-eye"></i>
                </a>';
                return $btn;
         })
         ->rawColumns(['aksi'])
            ->make(true);
    }
}
