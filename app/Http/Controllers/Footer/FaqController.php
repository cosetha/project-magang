<?php

namespace App\Http\Controllers\Footer;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Faq;
use DataTables;

class FaqController extends Controller
{
    public function index()
    {
        return view('admin.Footer.faqAdmin');
    }

    public function store(Request $request)
    {
        $faq = new Faq;
        $faq->pertanyaan = $request->pertanyaan;
        $faq->jawaban = $request->jawaban;
        $faq->save();

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function update(Request $request, $id)
    {
        $faq = Faq::find($id);
        $faq->pertanyaan = $request->pertanyaan_edit;
        $faq->jawaban = $request->jawaban_edit;
        $faq->save();

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function destroy($id)
    {
        $faq = Faq::find($id);
        $faq->delete();

        return response()->json([
            "message" => "success"
        ]);
    }

    public function LoadTableFaq(){
        return view('datatable.TableFaq');
    }

    public function LoadDataFaq(){
        $faq = Faq::orderBy('id','desc')->get();

            return Datatables::of($faq)->addIndexColumn()
            ->addColumn('aksi', function($row){
                $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" data-pertanyaan="'.$row->pertanyaan.'" data-jawaban="'.$row->jawaban.'" class="btn-edit-faq" style="font-size: 18pt; text-decoration: none;" class="mr-3">
                <i class="fas fa-pen-square"></i>
                </a>';
                $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-pertanyaan="'.$row->pertanyaan.'" data-jawaban="'.$row->jawaban.'" class="btn-delete-faq" style="font-size: 18pt; text-decoration: none; color:red;">
                <i class="fas fa-trash"></i>
                </a>';
                return $btn;
         })
         ->rawColumns(['aksi'])
            ->make(true);
    }
}
