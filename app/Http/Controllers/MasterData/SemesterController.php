<?php

namespace App\Http\Controllers\MasterData;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Semester;
use DataTables;
class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.MasterData.semesterAdmin');
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
        $semester = new Semester;
        $semester->semester = $request->semester;
        $semester->status = "nonaktif";
        $semester->save();

        return response()->json([
            'message' => 'success',
            'data' => $request->all()
        ]);
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
        //
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
        $semester = Semester::find($id);
        $semester->semester = $request->semester;
        $semester->save();

        return response()->json([
            'message' => 'success',
            'data' => $request->all()
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
        $semester = Semester::find($id);
        $semester->delete();

        return response()->json([
            "message" => "success"
        ]);
    }

    public function AktifkanSemester($id){
        DB::table('semester')->update(array('status' => 'nonaktif'));

        $s = Semester::find($id);
        $s->status = "aktif";
        $s->save();

        return response([
            'message' => 'sukses'
        ]);
    }

    public function NonAktifkanSemester($id){

        $s = Semester::find($id);
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
