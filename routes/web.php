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



//ROUTER GUEST
Route::group(['middleware' => 'guest'],function(){

Route::get('/forget', function () {
    return view('admin/forgetpassword');
});


    Route::get('/','PageController@LoginForm');

});

//ROUTER KHUSUS SUPER-ADMIN
Route::group(['middleware' => ['auth','checkRole:1']],function(){

    Route::get('/datapengguna', function () {
        return view('admin/datapenggunaAdmin');
    });

});

//ROUTER CAMPURAN (BISA DIAKSES ADMIN DAN SUPER-ADMIN)
Route::group(['middleware' => ['auth','checkRole:1,2']],function(){

    Route::get('/logout','PageController@logout');

    Route::get('/dashboard', 'PageController@Dashboard')->name('home');


    //Master Data
    Route::get('/jabatan','JabatanController@index');
    Route::get('/load/table-jabatan','JabatanController@LoadTableJabatan');
    Route::get('/load/data-jabatan','JabatanController@LoadDataJabatan');
    Route::get('/admin/delete-jabatan/{id}','JabatanController@destroy');
    Route::post('/admin/tambah-jabatan','JabatanController@store');
    Route::post('/admin/edit-jabatan/{id}','JabatanController@update');

    Route::get('/semester','SemesterController@index');
    Route::get('/load/table-semester','SemesterController@LoadTableSemester');
    Route::get('/load/data-semester','SemesterController@LoadDataSemester');
    Route::get('/admin/delete-semester/{id}','SemesterController@destroy');
    Route::post('/admin/tambah-semester','SemesterController@store');
    Route::post('/admin/edit-semester/{id}','SemesterController@update');


    Route::get('/bk','BidangKeahlianController@index');
    Route::post('/admin/tambah-bk','BidangKeahlianController@store');
    Route::get('/load/table-bk','BidangKeahlianController@LoadTableBK');
    Route::get('/load/data-bk','BidangKeahlianController@LoadDataBK');
    Route::get('/admin/delete-bk/{id}','BidangKeahlianController@destroy');
    Route::get('/admin/edit-bk/{id}','BidangKeahlianController@edit');
    Route::post('/admin/konfirmasi-edit-bk/{id}','BidangKeahlianController@update');
    Route::post('/upload','BidangKeahlianController@storeImg');

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

});

Auth::routes();

