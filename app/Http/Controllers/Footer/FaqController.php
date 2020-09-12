<?php

namespace App\Http\Controllers\Footer;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Faq;
use App\Histori;
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

        $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Tambah";
                    $history->keterangan = "Menambahkan FAQ '".$request->pertanyaan."'";
                    $history->save();

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function update(Request $request, $id)
    {
        $faq = Faq::find($id);
        if($faq->pertanyaan != $request->pertanyaan_edit){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit FAQ '".$faq->pertanyaan."' menjadi '".$request->pertanyaan_edit."'";
                    $history->save();
        }
        if($faq->jawaban != $request->jawaban_edit){
            $history = new Histori;
                    $history->nama = auth()->user()->name;
                    $history->aksi = "Edit";
                    $history->keterangan = "Mengedit Jawaban FAQ '".$request->pertanyaan_edit."'";
                    $history->save();
        }
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
        $history = new Histori;
        $history->nama = auth()->user()->name;
        $history->aksi = "Hapus";
        $history->keterangan = "Menghapus FAQ '".$faq->pertanyaan."'";
        $history->save();
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
