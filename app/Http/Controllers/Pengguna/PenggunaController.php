<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\User;
use DataTables;

class PenggunaController extends Controller
{
    public function index(){
        return view('admin.pengguna.datapenggunaAdmin');
    }

    public function store(Request $request){
        $u = new User;
        $u->name = $request->name;
        $u->email = $request->email;
        $u->password = bcrypt('rahasia_admin');
        $u->id_role = 2;
        $u->save();

        return response([
            'message' => 'sukses'
        ]);
    }

    public function destroy($id){
        $u = User::find($id);
        $u->delete();

        return response([
            'message' => "delete sukses"
        ]);
    }

    public function LoadTablePengguna(){
        return view('datatable.TablePengguna');
    }

    public function LoadDataPengguna(){
        $jabatan = User::where('id_role','2')->orderBy('id','desc')->get();

            return Datatables::of($jabatan)->addIndexColumn()
            ->addColumn('aksi', function($row){
                $btn =  '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->name.'" class="btn-delete-pengguna" style="font-size: 18pt; text-decoration: none; color:red;">
                <i class="fas fa-trash"></i>
                </a>';
                return $btn;
         })
         ->rawColumns(['aksi'])
            ->make(true);
    }
}
