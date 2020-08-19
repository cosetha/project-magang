<?php

namespace App\Http\Controllers;
use App\User;
use App\Dosen;
use DB;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function Dashboard(){
      $admin = User::count();
      $dosen = Dosen::count();
      $tenaga = DB::table('tenaga_kependidikan')->count();
      return view('admin.dashboardAdmin', compact('admin', 'dosen', 'tenaga'));
    }

    public function SosialMedia(){
        return view('admin.MiniNavbar.socialmediaAdmin');
    }

    public function LoginForm(){
        return view('auth.login');
    }

    public function IndexJabatan(){
        return view('admin.MasterData.jabatanAdmin');
    }

    public function Mahasiswa(){
      return view('admin/Akademik/mahasiswaAdmin');
    }

    public function Dokumen(){
      return view('admin/Akademik/dokumenAdmin');
    }

    public function Form(){
      return view('admin/Akademik/formAdmin');
    }

    public function Jadwal(){
      return view('admin/Akademik/jadwalAdmin');
    }

    public function Kalender(){
      return view('admin/Akademik/kalenderAdmin');
    }

    public function Kegiatan(){
      return view('admin/Akademik/kegiatanakaAdmin');
    }

    public function Ojt(){
      return view('admin/Akademik/ojtAdmin');
    }

    public function Fasilitas(){
      return view('admin/Fasilitas/fasilitasAdmin');
    }

    public function Blog(){
      return view('admin/Footer/blogAdmin');
    }

    public function Faq(){
      return view('admin/Footer/faqAdmin');
    }

    public function Layanan(){
      return view('admin/Footer/layananAdmin');
    }

    public function Headline(){
      return view('admin/Home/headlineAdmin');
    }

    public function Berita(){
      return view('admin/Home/beritaAdmin');
    }

    public function BK(){
      return view('admin/MasterData/bidangkeahlianAdmin');
    }

    public function Agenda(){
      return view('admin/Home/agendaAdmin');
    }

    public function Kerjasama(){
      return view('admin/Home/kerjasamaAdmin');
    }

    public function Pengumuman(){
      return view('admin/Home/pengumumanAdmin');
    }

    public function Alumni(){
      return view('admin/Kemahasiswaan/dataalumniAdmin');
    }

    public function Lomba(){
      return view('admin/Kemahasiswaan/infolombaAdmin');
    }

    public function KegiatanProdi(){
      return view('admin/Kemahasiswaan/kegiatanprodiAdmin');
    }

    public function Lowongan(){
      return view('admin/Kemahasiswaan/lowonganAdmin');
    }

    public function Organisasi(){
      return view('admin/Kemahasiswaan/organisasiAdmin');
    }

    public function Menu(){
      return view('admin/MiniNavbar/quickmenuAdmin');
    }

    public function Prestasi(){
      return view('admin/Profile/prestasiAdmin');
    }

    public function Sejarah(){
      return view('admin/Profile/sejarahAdmin');
    }

    public function VisiMisi(){
      return view('admin/Profile/visimisiAdmin');
    }

    public function Tenaga(){
      return view('admin/Profile/tenaga');
    }

    public function Penelitian(){
      return view('admin/Riset/penelitianAdmin');
    }

    public function Pengabdian(){
      return view('admin/Riset/pengabdianAdmin');
    }


    public function logout(Request $request){
        $id = auth()->user()->id;

        $user = User::find($id);
        $user->remember_token = "";
        $user->save();

        $request->session()->flush();
        return redirect('/');
    }
}
