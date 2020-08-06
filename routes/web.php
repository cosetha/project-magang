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
    Route::get('/blog', 'Home\WeblinkController@indexBlog');
    Route::get('/load/table-blog', 'Home\WeblinkController@LoadTableWebLink');
    Route::get('/load/data-blog', 'Home\WeblinkController@LoadDataBlog');
    Route::get('/admin/delete-blog/{id}', 'Home\WeblinkController@destroy');
    Route::post('/tambah/blog', 'Home\WeblinkController@store');
    Route::post('admin/edit-blog/{id}', 'Home\WeblinkController@update');

    Route::get('/faq','Footer\FaqController@index');
    Route::get('/load/table-faq','Footer\FaqController@LoadTableFaq');
    Route::get('/load/data-faq','Footer\FaqController@LoadDataFaq');
    Route::get('/admin/delete-faq/{id}','Footer\FaqController@destroy');
    Route::post('/admin/tambah-faq','Footer\FaqController@store');
    Route::post('/admin/edit-faq/{id}','Footer\FaqController@update');

    Route::get('/layanan', 'Home\WeblinkController@indexLayanan');
    Route::get('/load/table-layanan', 'Home\WeblinkController@LoadTableWebLink');
    Route::get('/load/data-layanan', 'Home\WeblinkController@LoadDataLayanan');
    Route::get('/admin/delete-layanan/{id}', 'Home\WeblinkController@destroy');
    Route::post('/tambah/layanan', 'Home\WeblinkController@store');
    Route::post('admin/edit-layanan/{id}', 'Home\WeblinkController@update');


    //Home
    Route::get('/headline', 'Home\HeadLineController@index');
    Route::post('/admin/tambah-headline','Home\HeadLineController@store');
    Route::get('/load/table-headline','Home\HeadLineController@LoadTableHeadLine');
    Route::get('/load/data-headline','Home\HeadLineController@LoadDataHeadLine');
    Route::get('/admin/delete-headline/{id}','Home\HeadLineController@destroy');
    Route::get('/admin/edit-headline/{id}','Home\HeadLineController@edit');
    Route::POST('/admin/konfirmasi-edit-headline/{id}','Home\HeadLineController@update');

    Route::get('/konten', 'Home\KontenController@index');
    Route::post('/admin/tambah-konten','Home\KontenController@store');
    Route::get('/load/table-konten','Home\KontenController@LoadTableKonten');
    Route::get('/load/data-konten','Home\KontenController@LoadDataKonten');
    Route::get('/admin/delete-konten/{id}','Home\KontenController@destroy');
    Route::get('/admin/edit-konten/{id}','Home\KontenController@edit');
    Route::POST('/admin/konfirmasi-edit-konten/{id}','Home\KontenController@update');

    Route::get('/berita', 'PageController@Berita');

    Route::get('/agenda', 'PageController@Agenda');


    Route::get('/kerjasama', 'Home\KerjaSamaController@index');
    Route::post('/admin/tambah-kerjasama','Home\KerjaSamaController@store');
    Route::get('/load/table-kerjasama','Home\KerjaSamaController@LoadTableKerjaSama');
    Route::get('/load/data-kerjasama','Home\KerjaSamaController@LoadDataKerjaSama');
    Route::get('/admin/delete-kerjasama/{id}','Home\KerjaSamaController@destroy');
    Route::get('/admin/edit-kerjasama/{id}','Home\KerjaSamaController@edit');
    Route::POST('/admin/konfirmasi-edit-kerjasama/{id}','Home\KerjaSamaController@update');


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
    Route::get('/sosmed', 'Home\WeblinkController@indexSosmed');
    Route::get('/load/table-sosmed', 'Home\WeblinkController@LoadTableWebLink');
    Route::get('/load/data-sosmed', 'Home\WeblinkController@LoadDataSosmed');
    Route::get('/admin/delete-sosmed/{id}', 'Home\WeblinkController@destroy');
    Route::post('/tambah/sosmed', 'Home\WeblinkController@store');
    Route::post('admin/edit-sosmed/{id}', 'Home\WeblinkController@update');

    Route::get('/quick-menu', 'Home\WeblinkController@IndexQuickMenu');
    Route::get('/load/table-quick-menu', 'Home\WeblinkController@LoadTableWebLink');
    Route::get('/load/data-quick-menu', 'Home\WeblinkController@LoadDataQuickMenu');
    Route::get('/admin/delete-quick-menu/{id}', 'Home\WeblinkController@destroy');
    Route::post('/tambah/quick-menu', 'Home\WeblinkController@store');
    Route::post('admin/edit-quick-menu/{id}', 'Home\WeblinkController@update');

    //Profile
    Route::get('/dosen', 'PageController@Dosen');

    Route::get('/prestasi', 'PageController@Prestasi');

    Route::get('/sejarah', 'PageController@Sejarah');

    Route::get('/struktur', 'Profile\StrukturOrganisasiController@index');
    Route::post('/admin/tambah-struktur-organisasi', 'Profile\StrukturOrganisasiController@store');
    Route::post('/admin/edit-struktur-organisasi/{id}', 'Profile\StrukturOrganisasiController@update');
    Route::get('/admin/delete-struktur-organisasi/{id}', 'Profile\StrukturOrganisasiController@destroy');
    Route::get('/load/table-so','Profile\StrukturOrganisasiController@LoadTableSO');
    Route::get('/load/data-so','Profile\StrukturOrganisasiController@LoadDataSO');
    Route::get('/get-data-so/{id}','Profile\StrukturOrganisasiController@get');

    Route::get('/visimisi', 'PageController@VisiMisi');

    Route::get('/tenaga', 'PageController@Tenaga');


    //Riset
    Route::get('/penelitian', 'PageController@Penelitian');

    Route::get('/pengabdian', 'PageController@Pengabdian');

});

Auth::routes();
