<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Konten;
use \App\StrukturOrganisasiProdi;

class GuestController extends Controller
{
    public function VisiMisi(){
        $visimisi = Konten::where('status','aktif')->where('menu','Visi dan Misi')->get();

        return view('user.Profile/visimisi',compact('visimisi'));
    }

    public function StrukturOrganisasi(){
        $data = StrukturOrganisasiProdi::latest()->get();

        return view('user.Profile/struktur',compact('data'));
    }
}
