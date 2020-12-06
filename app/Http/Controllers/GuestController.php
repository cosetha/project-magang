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

    public function dosenTenagaKerja()
    {
        $tenaga = \App\TenagaKependidikan::get();
        $dosen = \App\Dosen::get();
        return view('user.Profile.dosen', compact('dosen', 'tenaga'));
    }

    public function home()
    {
        $bk = \App\Bidang_Keahlian::get();
        $berita = \App\Berita::latest()->get();
        $pengumuman = \App\Pengumuman::get();
        $agenda = \App\Agenda::get();
        $kerjaSama = \App\KerjaSama::get();
        return view('user.Home', compact('bk', 'berita', 'pengumuman', 'agenda', 'kerjaSama'));
    }

}
