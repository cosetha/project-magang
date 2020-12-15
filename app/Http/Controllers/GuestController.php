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

        $jml_alumni = count(\App\Alumni::get());
        $jml_mahasiswa = count(\App\Mahasiswa::get());
        $dosen = count(\App\Dosen::get());
        $staff = count(\App\TenagaKependidikan::get());
        $jml_dosen_staff = $dosen + $staff;
        $jml_bk = count(\App\Bidang_keahlian::get());
        return view('user.Home', compact('bk', 'berita', 'pengumuman', 'agenda', 'kerjaSama','jml_alumni','jml_mahasiswa','jml_dosen_staff','jml_bk'));
    }

    public function load_layout_loop(){

        $fasilitas = \App\Fasilitas::get();
        $blog = \App\Blog::get();
        $faq = \App\Faq::get();

        return response([
            'fasilitas' => $fasilitas,
            'blog' => $blog,
            'faq' => $faq
        ]);
    }

}
