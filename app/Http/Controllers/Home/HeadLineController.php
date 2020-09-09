<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Headline;
use App\Histori;

use DataTables;
use Validator;
class HeadLineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/Home/headlineAdmin');
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
            'judul.required'=>'Field Judul Perlu di Isi',
            'gambar.required'=>'Field Gambar Perlu di Isi',
            'gambar.mimes'=>'Field Gambar Perlu di Isi dengan Format: jpeg,jpg,png',
            'caption.required'=>'Field Caption Perlu di Isi',
        );
        $validator = Validator::make($request->all(),[
            'judul' => 'required|string|min:1|max:255',
            'gambar' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            "caption" => 'required|string'],$messsages);
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
                $headline = new Headline;
                $headline->judul = $request->judul;
                $headline->caption = $request->caption;
                $headline->gambar= $directory."/".$nama;
                $headline->save();

                $history = new Histori;
                $history->nama = auth()->user()->name;
                $history->aksi = "Tambah";
                $history->keterangan = "Menambahkan Headline '".$request->judul."'";
                $history->save();

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
        $data = Headline::find($id);

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
        if($request->hasFile('gambar')){
        $messsages = array(
            'judul.required'=>'Field Judul Perlu di Isi',
            'gambar.mimes'=>'Field Gambar Perlu di Isi dengan Format: jpeg,jpg,png',
            'caption.required'=>'Field Caption Perlu di Isi',
        );
        $validator = Validator::make($request->all(),[
            'judul' => 'required|string|min:1|max:255',
            'gambar' => 'mimes:jpeg,jpg,png,gif|max:10000',
            "caption" => 'required|string'],$messsages);
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


            $headline = Headline::find($id);
            if($headline->judul != $request->judul){
                $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit BK '".$headline->judul."' menjadi '".$request->judul."'";
                    $history->save();
            }
            if($headline->caption != $request->caption){
                $history = new Histori;
                $history->nama = auth()->user()->name;
                $history->aksi = "Edit";
                $history->keterangan = "Mengedit Caption Headline '".$headline->judul;
                $history->save();
            }
            if($headline->gambar != $directory."/".$nama_file){
                $history = new Histori;
                $history->nama = auth()->user()->name;
                $history->aksi = "Edit";
                $history->keterangan = "Mengedit Gambar Headline '".$headline->judul."'";
                $history->save();
            }

            try {
                unlink($headline->gambar);
            } catch (\Throwable $th) {
                echo($th);
            }


            $headline->judul = $request->judul;
            $headline->caption = $request->caption;
            $headline->gambar= $directory."/".$nama_file;
            $headline->save();

            return response()->json([
                'message' => 'Success'
            ]);
         }
    }else{
        $messsages = array(
            'judul.required'=>'Field Judul Perlu di Isi',
            'caption.required'=>'Field Caption Perlu di Isi',
        );
        $validator = Validator::make($request->all(),[
            'judul' => 'required|string|min:1|max:255',
            'gambar' => 'mimes:jpeg,jpg,png,gif|max:10000',
            "caption" => 'required|string'],$messsages);
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return response()->json([
                'error' => $error,
              ]);
         }else{
        $headline = Headline::find($id);
        if($headline->judul != $request->judul){
            $history = new Histori;
                $history->nama = auth()->user()->name;
                $history->aksi = "Edit";
                $history->keterangan = "Mengedit BK '".$headline->judul."' menjadi '".$request->judul."'";
                $history->save();
        }
        if($headline->caption != $request->caption){
            $history = new Histori;
            $history->nama = auth()->user()->name;
            $history->aksi = "Edit";
            $history->keterangan = "Mengedit Caption Headline '".$headline->judul;
            $history->save();
        }
        $headline->judul = $request->judul;
        $headline->caption = $request->caption;
        $headline->save();
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
            $headline = Headline::find($id);
            $history = new Histori;
            $history->nama = auth()->user()->name;
            $history->aksi = "Hapus";
            $history->keterangan = "Menghapus Headline '".$headline->judul."'";
            $history->save();
            try {
                unlink($headline->gambar);
            } catch (\Throwable $th) {
                echo($th);
            }
            $headline->delete();
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
    public function LoadTableHeadLine(){
        return view('datatable.TableHeadLine');
    }

    public function LoadDataHeadLine(){
        $headline = Headline::orderBy('id','desc')->get();

            return Datatables::of($headline)->addIndexColumn()
            ->addColumn('aksi', function($row){
                $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->judul.'" class="btn-edit-headline" style="font-size: 18pt; text-decoration: none;" class="mr-3">
                <i class="fas fa-pen-square"></i>
                </a>';
                $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->judul.'" class="btn-delete-headline" style="font-size: 18pt; text-decoration: none; color:red;">
                <i class="fas fa-trash"></i>
                </a>';
                return $btn;
         })
         ->rawColumns(['aksi'])
            ->make(true);
    }
}
