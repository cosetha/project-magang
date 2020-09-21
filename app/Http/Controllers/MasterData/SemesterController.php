<?php

namespace App\Http\Controllers\MasterData;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Semester;
use App\Histori;
use DataTables;
use Validator;
class SemesterController extends Controller
{

    public function index()
    {
        return view('admin.MasterData.semesterAdmin');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'semester_tambah' => 'required|string'
        ]);
        if($validator->fails()) {
            return response([
                'message' => 'gagal'
            ]);
        }

        $semester = new Semester;
        $semester->semester = $request->semester_tambah;
        $semester->status = "nonaktif";
        $semester->save();

        $history = new Histori;
        $history->nama = auth()->user()->name;
        $history->aksi = "Tambah";
        $history->keterangan = "Menambahkan Semester '".$request->semester_tambah."'";
        $history->save();

        return response()->json([
            'message' => 'success',
            'data' => $request->all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'semester' => 'required|string'
        ]);
        if($validator->fails()) {
            return response([
                'message' => 'gagal'
            ]);
        }

        $semester = Semester::find($id);
        $history = new Histori;
        $history->nama = auth()->user()->name;
        $history->aksi = "Edit";
        $history->keterangan = "Mengedit Semester '".$semester->semester."' menjadi '".$request->semester."'";
        $history->save();
        $semester->semester = $request->semester;
        $semester->save();

        return response()->json([
            'message' => 'success',
            'data' => $request->all()
        ]);
    }

    public function destroy($id)
    {
        $semester = Semester::find($id);
        $semester->delete();

        $history = new Histori;
        $history->nama = auth()->user()->name;
        $history->aksi = "Hapus";
        $history->keterangan = "Menghapus Semester '".$semester->semester."'";
        $history->save();

        return response()->json([
            "message" => "success"
        ]);
    }

    public function AktifkanSemester($id){
        DB::table('semester')->update(array('status' => 'nonaktif'));

        $s = Semester::find($id);

        $history = new Histori;
        $history->nama = auth()->user()->name;
        $history->aksi = "Mengaktifkan";
        $history->keterangan = "Mengaktifkan Semester '".$s->semester."'";
        $history->save();

        $s->status = "aktif";
        $s->save();

        return response([
            'message' => 'sukses'
        ]);
    }

    public function NonAktifkanSemester($id){

        $s = Semester::find($id);

        $history = new Histori;
        $history->nama = auth()->user()->name;
        $history->aksi = "Menonaktifkan";
        $history->keterangan = "Menonaktifkan Semester '".$s->semester."'";
        $history->save();

        $s->status = "nonaktif";
        $s->save();

        return response([
            'message' => 'sukses'
        ]);
    }

    public function LoadTableSemester(){
        return view('datatable.TableSemester');
    }

    public function LoadDataSemester(){
        $semester = Semester::orderBy('id','desc')->get();

            return Datatables::of($semester)->addIndexColumn()
            ->addColumn('aksi', function($row){
                $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" data-semester="'.$row->semester.'" data-status="'.$row->status.'"  class="btn-edit-semester" style="font-size: 18pt; text-decoration: none;" class="mr-3">
                <i class="fas fa-pen-square"></i>
                </a>';
                $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-semester="'.$row->semester.'" data-status="'.$row->status.'" class="btn-delete-semester" style="font-size: 18pt; text-decoration: none; color:red;">
                <i class="fas fa-trash"></i>
                </a>';
                return $btn;
         })
         ->rawColumns(['aksi'])
            ->make(true);
    }
}
