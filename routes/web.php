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
    Route::get('/editprofile', 'PageController@EditProfile');

    Route::get('/editpassword', 'PageController@EditPassword');


    //Akademik
    Route::get('/mahasiswa', 'PageController@Mahasiswa');

    Route::get('/dokumen', 'PageController@Dokumen');

    Route::get('/form', 'PageController@Form');

    Route::get('/jadwal', 'PageController@Jadwal');

    Route::get('/kalender', 'PageController@Kalender');

    Route::get('kegiatan', 'PageController@Kegiatan');

    Route::get('ojt', 'PageController@Ojt');

    Route::get('/tugasakhir', 'PageController@TugasAkhir');


    //Fasilitas
    Route::get('/fasilitas', 'PageController@Fasilitas');


    //Footer
    Route::get('/blog', 'PageController@Blog');

    Route::get('/faq', 'PageController@Faq');

    Route::get('/layanan', 'PageController@Layanan');


    //Home
    Route::get('/headline', 'PageController@Headline');

    Route::get('/berita', 'PageController@Berita');


    Route::get('/bk', 'PageController@BK');

    Route::get('/agenda', 'PageController@Agenda');


    Route::get('/kerjasama', 'PageController@Kerjasama');

    Route::get('/pengumuman', 'PageController@Pengumuman');


    //Kemahasiswaan
    Route::get('/alumni', 'PageController@Alumni');

    Route::get('/lomba', 'PageController@Lomba');

    Route::get('/kegiatanpro', 'PageController@KegiatanProdi');

    Route::get('/lowongan', 'PageController@Lowongan');

    Route::get('/organisasi', 'PageController@Organisasi');


    //MiniNavba
    Route::get('/sosmed', 'PageController@Sosmed');

    Route::get('/menu', 'PageController@Menu');


    //Profile
    Route::get('/dosen', 'PageController@Dosen');

    Route::get('/prestasi', 'PageController@Prestasi');

    Route::get('/sejarah', 'PageController@Sejarah');

    Route::get('/struktur', 'PageController@Struktur');

    Route::get('/visimisi', 'PageController@VisiMisi');

    Route::get('/tenaga', 'PageController@Tenaga');


    //Riset
    Route::get('/penelitian', 'PageController@Penelitian');

    Route::get('/pengabdian', 'PageController@Pengabdian');

});

Auth::routes();
