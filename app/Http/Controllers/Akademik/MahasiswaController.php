<?php

namespace App\Http\Controllers\Akademik;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Bidang_keahlian;
use DataTables;
use Illuminate\Support\Facades\Storage;
use Validator;
use App\Exports\MahasiswaExport;
use App\Imports\MahasiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bk = Bidang_keahlian::all();
        return view('admin/Akademik/mahasiswaAdmin',['bidang'=>$bk]);
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
            'nama' => 'required',
            'nim' => 'required',
            "angkatan" => 'required',
            "bk" => 'required']
        );
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return response()->json([
                'error' => $error,
              ]);
         }else{
            try {
                $mahasiswa = new Mahasiswa;
                $mahasiswa->nama = $request->nama;
                $mahasiswa->nim = $request->nim;
                $mahasiswa->kode_bk = $request->bk;
                $mahasiswa->angkatan = $request->angkatan;
                $mahasiswa->save();
    
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
        $data = Mahasiswa::find($id);

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
        $validator = Validator::make($request->all(),[
            'nama' => 'required',
            'nim' => 'required',
            "angkatan" => 'required',
            "bk" => 'required']
        );
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return response()->json([
                'error' => $error,
              ]);
         }else{
            try {
                $mahasiswa = Mahasiswa::find($id);
                $mahasiswa->nama = $request->nama;
                $mahasiswa->nim = $request->nim;
                $mahasiswa->kode_bk = $request->bk;
                $mahasiswa->angkatan = $request->angkatan;
                $mahasiswa->save();
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $mahasiswa = Mahasiswa::find($id);
            $mahasiswa->delete();
            return response()->json([
                "message" => "Success"
            ]);
            } catch (\Exception $e) {
                return response()->json([
                    'error' => $e->getMessage()
                ]);
            }
    }
    public function LoadTableMahasiswa(){
        return view('datatable.akademik.TableMahasiswa');
    }

    public function LoadDataMahasiswa(){
        $mhs = Mahasiswa::with('bidangKeahlian')->orderBy('id','desc')->get();
            return Datatables::of($mhs)->addIndexColumn()
            ->addColumn('aksi', function($row){
                $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama.'" class="btn-edit-mahasiswa" style="font-size: 18pt; text-decoration: none;" class="mr-3">
                <i class="fas fa-pen-square"></i>
                </a>';
                $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama.'" class="btn-delete-mahasiswa" style="font-size: 18pt; text-decoration: none; color:red;">
                <i class="fas fa-trash"></i>
                </a>';
                return $btn;
         })
         ->rawColumns(['aksi'])
            ->make(true);
    }

    public function export_excel(Request $request) 
    {       
        if($request->type == 'Excel'){
            try {
                return Excel::download(new MahasiswaExport($request), 'mahasiswa.xlsx');
            } catch (\Throwable $th) {
               
            }
           
        }else if($request->type == 'Pdf'){
            if($request->bk == 0 ){
                $mhs = Mahasiswa::with('bidangKeahlian')->get();
                $pdf = PDF::loadview('PDF/Mhs_PDF',['mhs'=>$mhs]);
                return $pdf->download('laporan-mahasiswa.pdf');
            }else {
                $mhs = Mahasiswa::where('kode_bk', $request->bk)->get();
                $pdf = PDF::loadview('PDF/Mhs_PDF',['mhs'=>$mhs]);
                return $pdf->download('laporan-mahasiswa.pdf');
            }
            
        }
       
    } 
    public function import_excel(Request $request) 
    {       
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        try {
         $file = $request->file('file');
		Excel::import(new MahasiswaImport, $file);
		return redirect('/mahasiswa');
        } catch (\Throwable $th) {
            
        }
		
    } 
    // public function load_mhs(Request $request) 
    // {       
    //     $data = Mahasiswa::all();
    //     $output = [];
    //     $i = 1;
    //     foreach ($data as $mhs)
    //     {
    //         echo($mhs->bidangKeahlian()->first()->nama_bk);
    //     }
    // } 
}
