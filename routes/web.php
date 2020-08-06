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
    Route::get('/jabatan','MasterData\JabatanController@index');
    Route::get('/load/table-jabatan','MasterData\JabatanController@LoadTableJabatan');
    Route::get('/load/data-jabatan','MasterData\JabatanController@LoadDataJabatan');
    Route::get('/admin/delete-jabatan/{id}','MasterData\JabatanController@destroy');
    Route::post('/admin/tambah-jabatan','MasterData\JabatanController@store');
    Route::post('/admin/edit-jabatan/{id}','MasterData\JabatanController@update');

    Route::get('/semester','MasterData\SemesterController@index');
    Route::get('/load/table-semester','MasterData\SemesterController@LoadTableSemester');
    Route::get('/load/data-semester','MasterData\SemesterController@LoadDataSemester');
    Route::get('/admin/delete-semester/{id}','MasterData\SemesterController@destroy');
    Route::post('/admin/tambah-semester','MasterData\SemesterController@store');
    Route::post('/admin/edit-semester/{id}','MasterData\SemesterController@update');


    Route::get('/bk','MasterData\BidangKeahlianController@index');
    Route::post('/admin/tambah-bk','MasterData\BidangKeahlianController@store');
    Route::get('/load/table-bk','MasterData\BidangKeahlianController@LoadTableBK');
    Route::get('/load/data-bk','MasterData\BidangKeahlianController@LoadDataBK');
    Route::get('/admin/delete-bk/{id}','MasterData\BidangKeahlianController@destroy');
    Route::get('/admin/edit-bk/{id}','MasterData\BidangKeahlianController@edit');
    Route::post('/admin/konfirmasi-edit-bk/{id}','MasterData\BidangKeahlianController@update');
    Route::POST('/upload','MasterData\BidangKeahlianController@storeImg');

    //Admin Profile
    Route::get('/editprofile', 'PengaturanAkun\ProfileController@EditProfile');
    Route::post('/editprofile/{id}', 'PengaturanAkun\ProfileController@updateProfile');

    Route::get('/editpassword', 'PengaturanAkun\ProfileController@EditPassword');
    Route::post('/editpassword/{id}', 'PengaturanAkun\ProfileController@updatePassword');


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

    Route::get('/agenda', 'PageController@Agenda');


    Route::get('/kerjasama', 'PageController@Kerjasama');

    Route::prefix('pengumuman')->group(function () {
      Route::get('/', 'PageController@Pengumuman');
      Route::post('/', 'Home\PengumumanController@store');
      Route::get('data', 'Home\PengumumanController@index');
      Route::get('datatable', 'Home\PengumumanController@loadTable');
      Route::get('edit/{id}', 'Home\PengumumanController@edit');
      Route::post('update/{id}', 'Home\PengumumanController@update');
      Route::get('delete/{id}', 'Home\PengumumanController@destroy');
    });

    //Kemahasiswaan
    Route::get('/alumni', 'PageController@Alumni');

    Route::get('/lomba', 'PageController@Lomba');

    Route::get('/kegiatanpro', 'PageController@KegiatanProdi');

    Route::get('/lowongan', 'PageController@Lowongan');

    Route::get('/organisasi', 'PageController@Organisasi');


    //MiniNavbar
    Route::get('/sosmed', 'Home\WeblinkController@index');
    Route::get('/load/table-sosmed', 'Home\WeblinkController@LoadTableSosmed');
    Route::get('/load/data-sosmed', 'Home\WeblinkController@LoadDataSosmed');
    Route::get('/admin/delete-sosmed/{id}', 'Home\WeblinkController@destroy');
    Route::post('/tambah/sosmed', 'Home\WeblinkController@store');
    Route::post('admin/edit-sosmed/{id}', 'Home\WeblinkController@update');

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
