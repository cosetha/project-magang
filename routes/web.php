<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin/loginAdmin');
});

Route::get('/dashboard', function () {
    return view('admin/dashboardAdmin');
});

Route::get('/datapengguna', function () {
    return view('admin/datapenggunaAdmin');
});




//Admin Profile
Route::get('/editprofile', function () {
    return view('admin/AdminProfile/editprofileAdmin');
});

Route::get('/editpassword', function () {
    return view('admin/AdminProfile/editpasswordAdmin');
});



//Akademik
Route::get('/mahasiswa', function () {
    return view('admin/Akademik/mahasiswaAdmin');
});

Route::get('/dokumen', function () {
    return view('admin/Akademik/dokumenAdmin');
});

Route::get('/form', function () {
    return view('admin/Akademik/formAdmin');
});

Route::get('/jadwal', function () {
    return view('admin/Akademik/jadwalAdmin');
});

Route::get('/kalender', function () {
    return view('admin/Akademik/kalenderAdmin');
});

Route::get('kegiatan', function () {
    return view('admin/Akademik/kegiatanakaAdmin');
});

Route::get('ojt', function () {
    return view('admin/Akademik/ojtAdmin');
});

Route::get('/tugasakhir', function () {
    return view('admin/Akademik/tugasakhirAdmin');
});



//Fasilitas
Route::get('/fasilitas', function () {
    return view('admin/Fasilitas/fasilitasAdmin');
});


//Footer
Route::get('/blog', function () {
    return view('admin/Footer/blogAdmin');
});

Route::get('/faq', function () {
    return view('admin/Footer/faqAdmin');
});

Route::get('/layanan', function () {
    return view('admin/Footer/layananAdmin');
});


//Home
Route::get('/headline', function () {
    return view('admin/Home/headlineAdmin');
});

Route::get('/berita', function () {
    return view('admin/Home/beritaAdmin');
});

Route::get('/bk', function () {
    return view('admin/Home/bidangkeahlianAdmin');
});

Route::get('/agenda', function () {
    return view('admin/Home/agendaAdmin');
});

Route::get('/kerjasama', function () {
    return view('admin/Home/kerjasamaAdmin');
});

Route::get('/pengumuman', function () {
    return view('admin/Home/pengumumanAdmin');
});


//Kemahasiswaan
Route::get('/alumni', function () {
    return view('admin/Kemahasiswaan/dataalumniAdmin');
});

Route::get('/lomba', function () {
    return view('admin/Kemahasiswaan/infolombaAdmin');
});

Route::get('/kegiatanpro', function () {
    return view('admin/Kemahasiswaan/kegiatanprodiAdmin');
});

Route::get('/lowongan', function () {
    return view('admin/Kemahasiswaan/lowonganAdmin');
});

Route::get('/organisasi', function () {
    return view('admin/Kemahasiswaan/organisasiAdmin');
});


//MiniNavba
Route::get('/sosmed', function () {
    return view('admin/MiniNavbar/socialmediaAdmin');
});

Route::get('/menu', function () {
    return view('admin/MiniNavbar/quickmenuAdmin');
});


//Profile
Route::get('/dosen', function () {
    return view('admin/Profile/dosendantenagakerja');
});

Route::get('/prestasi', function () {
    return view('admin/Profile/prestasiAdmin');
});

Route::get('/sejarah', function () {
    return view('admin/Profile/sejarahAdmin');
});

Route::get('/struktur', function () {
    return view('admin/Profile/strukturorganisasiAdmin');
});

Route::get('/visimisi', function () {
    return view('admin/Profile/visimisiAdmin');
});

Route::get('/tenaga', function () {
    return view('admin/Profile/tenaga');
});



//Riset
Route::get('/penelitian', function () {
    return view('admin/Riset/penelitianAdmin');
});

Route::get('/pengabdian', function () {
    return view('admin/Riset/pengabdianAdmin');
});





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
