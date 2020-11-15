<?php

namespace App\Http\Controllers\Akademik;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Form;
use App\Histori;
use DataTables;
use Illuminate\Support\Facades\Storage;
use Validator;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/Akademik/formAdmin');
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
            'nama.required'=>'Field Nama Perlu di Isi',
            'file.required'=>'Field File Perlu di Isi',
            'file.mimes'=>'Field File Perlu di Isi dengan Format: doc,pdf,docx,zip,csv,xls,xlsx',
            'file.max'=> 'Size File Upload Maksimal 8MB'
        );
        $validator = Validator::make($request->all(),[
            'nama' => 'required',
            'file'   => 'required|mimes:doc,pdf,docx,zip,csv,xls,xlsx|max:8192'],$messsages
        );
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return response()->json([
                'error' => $error,
              ]);
         }else{
            try {
                $directory = 'assets/upload/file';
                $file = request()->file('file');
                $nama_file = time().$file->getClientOriginalName();
                $file->name = $nama_file;
                $file->move($directory, $file->name);
                $form = new Form;
                $form->nama_form = $request->nama;
                $form->file = $directory."/".$nama_file;
                $form->save();

                $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Tambah";
                    $history->keterangan = "Menambahkan Form '".$request->nama."'";
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
        $data = Form::find($id);

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



                if($request->hasFile('file')){
                    $messsages = array(
                        'nama.required'=>'Field Nama Perlu di Isi',
                        'file.required'=>'Field File Perlu di Isi',
                        'file.mimes'=>'Field File Perlu di Isi dengan Format: doc,pdf,docx,zip,csv,xls,xlsx',
                    );
                    $validator = Validator::make($request->all(),[
                        'nama' => 'required',
                        'file'   => 'mimes:doc,pdf,docx,zip,csv,xls,xlsx'],$messsages
                    );
                    if ($validator->fails()) {
                        $error = $validator->errors()->first();
                        return response()->json([
                            'error' => $error,
                          ]);
                    }else{
                        $directory = 'assets/upload/file';
                        $file = request()->file('file');
                        $nama_file = time().$file->getClientOriginalName();
                        $file->name = $nama_file;
                        $file->move($directory, $file->name);
                        $form = Form::find($id);
                        if($form->nama_form != $request->nama){
                            $history = new Histori;
                            $history->nama = auth()->user()->name;
                            $history->aksi = "Edit";
                            $history->keterangan = "Mengedit Form '".$form->nama_form."' menjadi '".$request->nama."'";
                            $history->save();
                        }
                        if($form->file != $directory."/".$nama_file){
                            $history = new Histori;
                            $history->nama = auth()->user()->name;
                            $history->aksi = "Edit";
                            $history->keterangan = "Mengedit File Form '".$request->nama."'";
                            $history->save();
                        }

                        try {
                            unlink($form->file);
                        } catch (\Throwable $th) {
                            //throw $th;
                        }
                        $form->nama_form = $request->nama;
                        $form->file = $directory."/".$nama_file;
                        $form->save();
                        return response()->json([
                            'message' => 'Success'
                        ]);
                    }

                }else{
                    $messsages = array(
                        'nama.required'=>'Field Nama Perlu di Isi',
                    );
                    $validator = Validator::make($request->all(),[
                        'nama' => 'required',
                        ],$messsages
                    );
                    if ($validator->fails()) {
                        $error = $validator->errors()->first();
                        return response()->json([
                            'error' => $error,
                          ]);
                    }else{
                    $form = Form::find($id);
                    if($form->nama_form != $request->nama){
                        $history = new Histori;
                        $history->nama = auth()->user()->name;
                        $history->aksi = "Edit";
                        $history->keterangan = "Mengedit Form '".$form->nama_form."' menjadi '".$request->nama."'";
                        $history->save();
                    }
                    $form->nama_form = $request->nama;
                    $form->save();
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
            $form = Form::find($id);
            $history = new Histori;
            $history->nama = auth()->user()->name;
            $history->aksi = "Hapus";
            $history->keterangan = "Menghapus Form '".$form->nama_form."'";
            $history->save();
            try {
                unlink($form->file);
            } catch (\Throwable $th) {
                echo $th;
            }
            $form->delete();
            return response()->json([
                "message" => "Success"
            ]);
            } catch (\Exception $e) {
                return response()->json([
                    'error' => $e->getMessage()
                ]);
            }
    }
    public function LoadTableForm(){
        return view('datatable.akademik.TableForm');
    }

    public function LoadDataForm(){
        $headline = Form::orderBy('id','desc')->get();
            return Datatables::of($headline)->addIndexColumn()
            ->addColumn('aksi', function($row){
                $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama_form.'" class="btn-edit-form" style="font-size: 18pt; text-decoration: none;" class="mr-3">
                <i class="fas fa-pen-square"></i>
                </a>';
                $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama_form.'" class="btn-delete-form" style="font-size: 18pt; text-decoration: none; color:red;">
                <i class="fas fa-trash"></i>
                </a>';
                return $btn;
         })
         ->rawColumns(['aksi'])
            ->make(true);
    }
}
