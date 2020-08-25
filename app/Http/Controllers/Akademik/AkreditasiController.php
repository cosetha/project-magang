<?php

namespace App\Http\Controllers\Akademik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Akreditasi;
use DataTables;
use Validator;

class AkreditasiController extends Controller
{
    public function index()
    {   $nilai = array(
        array('value' => 'A','alt' =>'A'),
        array('value' => 'B','alt' =>'B'),
        array('value' => 'C','alt' =>'C'),
        array('value' => 'Belum Terakreditasi','alt'=>'Belum Terakreditasi'));
        return view('admin.Akademik/akreditasiAdmin',['data'=>$nilai]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "lembaga" => 'required|unique:akreditasi,lembaga',
            'nilai' => 'required',
            "tanggal_mulai" => 'required',
        	"tanggal_selesai" => 'required']
        );
        if ($validator->fails()) {
            $error = $validator->messages()->toJson();
            return response()->json([
                'error' => $error,
              ]);
         }else{
            try {
                $akreditasi = new Akreditasi;
                $akreditasi->lembaga = $request->lembaga;
                $akreditasi->nilai = $request->nilai;
                $akreditasi->tanggal_mulai = $request->tanggal_mulai;
                $akreditasi->tanggal_selesai = $request->tanggal_selesai;
                $akreditasi->save();
    
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

    public function edit($id)
    {
        $data = Akreditasi::find($id);
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

    public function update(Request $request, $id)
    {
    	$akreditasi = Akreditasi::find($id);
        $validator = Validator::make($request->all(),[
            'lembaga' => 'required|unique:akreditasi,lembaga,'.$akreditasi->id,
            'nilai' => 'required',
            "tanggal_mulai" => 'required',
            "tanggal_selesai" => 'required']
        );
        if ($validator->fails()) {
            $error = $validator->messages()->toJson();
            return response()->json([
                'error' => $error,
              ]);
         }else{
            try {
	                $akreditasi = Akreditasi::find($id);
	                $akreditasi->lembaga = $request->lembaga;
	                $akreditasi->nilai = $request->nilai;
	                $akreditasi->tanggal_mulai=$request->tanggal_mulai;
	                $akreditasi->tanggal_selesai=$request->tanggal_selesai;
	                $akreditasi->save();

            } catch (\Exception $e) {
               
                return response()->json([
                    'error' => $e->getMessage()
                ]);
            }
           
         }
    }

    public function destroy($id)
    {
        try {
            $akreditasi = Akreditasi::find($id);
            $akreditasi->delete();
            return response()->json([
                "message" => "Success"
            ]);
            } catch (\Exception $e) {
                return response()->json([
                    'error' => $e->getMessage()
                ]);
        }
    }
    public function LoadTableAkreditasi(){
        return view('datatable.akademik.TableAkreditasi');
    }

    public function LoadDataAkreditasi(){
        $akreditasi = Akreditasi::orderBy('id','desc')->get();
            return Datatables::of($akreditasi)->addIndexColumn()
            ->addColumn('aksi', function($row){
                $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nilai="'.$row->nilai.'" class="btn-edit-akreditasi" style="font-size: 18pt; text-decoration: none;" class="mr-3">
                <i class="fas fa-pen-square"></i>
                </a>';
                $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-lembaga="'.$row->lembaga.'" class="btn-delete-akreditasi" style="font-size: 18pt; text-decoration: none; color:red;">
                <i class="fas fa-trash"></i>
                </a>';
                return $btn;
         })
         ->rawColumns(['aksi'])
            ->make(true);
    }
}
