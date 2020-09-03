<?php

namespace App\Http\Controllers\Akademik;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DataTables;
use Validator;
use App\Konten;
class OjtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/akademik/ojtAdmin');
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
            'menu.required'=>'Field Menu Perlu di Isi',
            'judul.required'=>'Field Judul Perlu di Isi',
            'deskripsi.required'=>'Field File Deskripsi di Isi',
        );
        $validator = Validator::make($request->all(),[
            'menu' => 'required|string',
            'judul' => 'required|string',
            "deskripsi" => 'required|string'],$messsages);
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return response()->json([
                'error' => $error,
              ]);
         }else{
            try {
                
                $konten = new Konten;
                $konten->judul = $request->judul;
                $konten->deskripsi = $request->deskripsi;
                $konten->menu = $request->menu;
                $konten->save();
    
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
        $data = Konten::find($id);

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
        $messsages = array(
            'menu.required'=>'Field Menu Perlu di Isi',
            'judul.required'=>'Field Judul Perlu di Isi',
            'deskripsi.required'=>'Field File Deskripsi di Isi',
        );
        $validator = Validator::make($request->all(),[
            'menu' => 'required|string',
            'judul' => 'required|string',
            "deskripsi" => 'required|string'],$messsages);
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return response()->json([
                'error' => $error,
              ]);
         }else{
            $konten = Konten::find($id);
            $konten->judul = $request->judul;
            $konten->deskripsi = $request->deskripsi;
            $konten->menu = $request->menu;
            $konten->save();
            return response()->json([
                'message' => 'Success'
            ]);
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
            $konten = Konten::find($id);
            $konten->delete();
            return response()->json([
                "message" => "Success"
            ]);
            } catch (\Exception $e) {
                return response()->json([
                    'error' => $e->getMessage()
                ]);
            }
    }
    public function LoadTableKonten(){
        return view('datatable.akademik.TableOjt');
    }

    public function LoadDataKonten(){
        $headline = Konten::where('menu','Ojt')->orderBy('id','desc')->get();
            return Datatables::of($headline)->addIndexColumn()
            ->addColumn('aksi', function($row){
                $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->judul.'" class="btn-edit-ojt" style="font-size: 18pt; text-decoration: none;" class="mr-3">
                <i class="fas fa-pen-square"></i>
                </a>';
                $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->judul.'" class="btn-delete-ojt" style="font-size: 18pt; text-decoration: none; color:red;">
                <i class="fas fa-trash"></i>
                </a>';
                $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->judul.'" class="btn-show-ojt" style="font-size: 18pt; text-decoration: none; color:green;">
                <i class="fas fa-eye"></i>
                </a>';
                return $btn;
         })
         ->rawColumns(['aksi'])
            ->make(true);
    }
}
