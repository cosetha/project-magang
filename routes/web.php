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

    Route::get('/login','PageController@LoginForm');

    Route::get('/', function () {
        return view('user.Home');
    });

    //Profile
    Route::get('/gdosen', function () {
        return view('user.Profile/dosen');
    });

    Route::get('/gprestasi', function () {
        return view('user.Profile/prestasi');
    });

    Route::get('/gsejarah', function () {
        return view('user.Profile/sejarah');
    });


    Route::get('/gvisimisi', function () {
        return view('user.Profile/visimisi');
    });

    Route::get('/gstruktur', function () {
        return view('user.Profile/struktur');
    });


    //Bidang Keahlian
    Route::get('/gbk', function () {
        return view('user.BK/bidangkeahlian');
    });

    //Akreditasi
    Route::get('/gakreditasi', function () {
        return view('user.Akademik/akreditasi');
    });

    Route::get('/gjadwalkuliah', function () {
        return view('user.Akademik/jadwalkuliah');
    });

    Route::get('/gmahasiswa', function () {
        return view('user.Akademik/mahasiswa');
    });

    Route::get('/gkalender', function () {
        return view('user.Akademik/kalender');
    });


    //Kemahasiswaan
    Route::get('/galumni', function () {
        return view('user.Kemahasiswaan/alumni');
    });

    Route::get('/gkegiatan', function () {
        return view('user.Kemahasiswaan/kegiatan');
    });

    Route::get('/gloker', function () {
        return view('user.Kemahasiswaan/loker');
    });

    Route::get('/gorganisasi', function () {
        return view('user.Kemahasiswaan/organisasi');
    });


    //Kemahasiswaan
    Route::get('/gpenelitian', function () {
        return view('user.Riset/penelitian');
    });

    Route::get('/gpengabdian', function () {
        return view('user.Riset/pengabdian');
    });

    Route::get('/gprofilepeneliti', function () {
        return view('user.Riset/profilepeneliti');
    });

    //Kemahasiswaan
    Route::get('/gfasilitas', function () {
        return view('user.Fasilitas/fasilitas');
    });

});

//ROUTER KHUSUS SUPER-ADMIN
Route::group(['middleware' => ['auth','checkRole:1']],function(){

    Route::get('/datapengguna', 'Pengguna\PenggunaController@index');
    Route::get('/load/table-pengguna','Pengguna\PenggunaController@LoadTablePengguna');
    Route::get('/load/data-pengguna','Pengguna\PenggunaController@LoadDataPengguna');
    Route::get('/hapus-pengguna/{id}','Pengguna\PenggunaController@destroy');
    Route::post('/tambah-pengguna','Pengguna\PenggunaController@store');

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
    Route::get('/aktifkan-semester/{id}','MasterData\SemesterController@AktifkanSemester');
    Route::get('/non-aktifkan-semester/{id}','MasterData\SemesterController@NonAktifkanSemester');
    Route::get('/non-aktif/semua-semester','MasterData\SemesterController@NonaktifkanSemester');
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
    Route::POST('/upload-file','FileController@store');

    //Admin Profile
    Route::get('/editprofile', 'PengaturanAkun\ProfileController@EditProfile');
    Route::post('/editprofile/{id}', 'PengaturanAkun\ProfileController@updateProfile');

    Route::get('/editpassword', 'PengaturanAkun\ProfileController@EditPassword');
    Route::post('/editpassword/{id}', 'PengaturanAkun\ProfileController@updatePassword');


    //Akademik

    // Akreditasi
    Route::get('/akreditasi', 'Akademik\AkreditasiController@index');
    Route::post('/admin/tambah-akreditasi','Akademik\AkreditasiController@store');
    Route::get('/load/table-akreditasi','Akademik\AkreditasiController@LoadTableAkreditasi');
    Route::get('/load/data-akreditasi','Akademik\AkreditasiController@LoadDataAkreditasi');
    Route::get('/admin/delete-akreditasi/{id}','Akademik\AkreditasiController@destroy');
    Route::get('/admin/edit-akreditasi/{id}','Akademik\AkreditasiController@edit');
    Route::POST('/admin/konfirmasi-edit-akreditasi/{id}','Akademik\AkreditasiController@update');

    // Mahasiswa
    Route::get('/mahasiswa', 'Akademik\MahasiswaController@index');
    Route::post('/admin/tambah-mahasiswa','Akademik\MahasiswaController@store');
    Route::get('/load/table-mahasiswa','Akademik\MahasiswaController@LoadTableMahasiswa');
    Route::get('/load/data-mahasiswa','Akademik\MahasiswaController@LoadDataMahasiswa');
    Route::get('/admin/delete-mahasiswa/{id}','Akademik\MahasiswaController@destroy');
    Route::get('/admin/edit-mahasiswa/{id}','Akademik\MahasiswaController@edit');
    Route::POST('/admin/konfirmasi-edit-mahasiswa/{id}','Akademik\MahasiswaController@update');

    Route::prefix('dokumen')->group(function () {
      Route::get('/', 'PageController@Dokumen');
      Route::post('/', 'Akademik\DokumenController@store');
      Route::get('data', 'Akademik\DokumenController@index');
      Route::get('datatable', 'Akademik\DokumenController@loadTable');
      Route::get('edit/{id}', 'Akademik\DokumenController@edit');
      Route::post('update/{id}', 'Akademik\DokumenController@update');
      Route::get('delete/{id}', 'Akademik\DokumenController@destroy');
    });

    Route::get('/form', 'Akademik\FormController@index');
    Route::post('/admin/tambah-form','Akademik\FormController@store');
    Route::get('/load/table-form','Akademik\FormController@LoadTableForm');
    Route::get('/load/data-form','Akademik\FormController@LoadDataForm');
    Route::get('/admin/delete-form/{id}','Akademik\FormController@destroy');
    Route::get('/admin/edit-form/{id}','Akademik\FormController@edit');
    Route::POST('/admin/konfirmasi-edit-form/{id}','Akademik\FormController@update');


    Route::prefix('jadwal')->group(function () {
      Route::get('/', 'PageController@Jadwal');
      Route::post('/', 'Akademik\JadwalKuliahController@store');
      Route::get('get-list', 'Akademik\JadwalKuliahController@list');
      Route::get('data', 'Akademik\JadwalKuliahController@index');
      Route::get('datatable', 'Akademik\JadwalKuliahController@loadTable');
      Route::get('edit/{id}', 'Akademik\JadwalKuliahController@edit');
      Route::post('update/{id}', 'Akademik\JadwalKuliahController@update');
      Route::get('delete/{id}', 'Akademik\JadwalKuliahController@destroy');
    });

    Route::prefix('kalender')->group(function () {
      Route::get('/', 'PageController@Kalender');
      Route::post('/', 'Akademik\KalenderAkademikController@store');
      Route::get('list-smt', 'Akademik\KalenderAkademikController@listSemester');
      Route::get('data', 'Akademik\KalenderAkademikController@index');
      Route::get('datatable', 'Akademik\KalenderAkademikController@loadTable');
      Route::get('edit/{id}', 'Akademik\KalenderAkademikController@edit');
      Route::post('update/{id}', 'Akademik\KalenderAkademikController@update');
      Route::get('delete/{id}', 'Akademik\KalenderAkademikController@destroy');
    });

    Route::get('kegiatan', 'Akademik\KegiatanAkademikController@index');
    Route::get('/load/table-kegiatan-akademik','Akademik\KegiatanAkademikController@LoadTableKA');
    Route::get('/load/data-kegiatan-akademik','Akademik\KegiatanAkademikController@LoadDataKA');
    Route::post('/store-ka', 'Akademik\KegiatanAkademikController@store');
    Route::post('/update-ka/{id}', 'Akademik\KegiatanAkademikController@update');
    Route::get('/delete-ka/{id}', 'Akademik\KegiatanAkademikController@destroy');
    Route::get('/get-ka/{id}','Akademik\KegiatanAkademikController@get');

    Route::get('ojt', 'Akademik\OjtController@index');
    Route::get('documents/pdf-document/', 'FileController@retrieve');
    Route::post('/admin/tambah-ojt','Akademik\OjtController@store');
    Route::get('/load/table-ojt','Akademik\OjtController@LoadTableKonten');
    Route::get('/load/data-ojt','Akademik\OjtController@LoadDataKonten');
    Route::get('/admin/delete-ojt/{id}','Akademik\OjtController@destroy');
    Route::get('/admin/edit-ojt/{id}','Akademik\OjtController@edit');
    Route::POST('/admin/konfirmasi-edit-ojt/{id}','Akademik\OjtController@update');

    Route::get('/tugasakhir', 'Akademik\TugasAkhirController@index');
    Route::post('/store-ta', 'Akademik\TugasAkhirController@store');
    Route::post('/update-ta/{id}', 'Akademik\TugasAkhirController@update');
    Route::get('/delete-ta/{id}', 'Akademik\TugasAkhirController@destroy');
    Route::get('/load/table-tugas-akhir','Akademik\TugasAkhirController@LoadTableTA');
    Route::get('/load/data-tugas-akhir','Akademik\TugasAkhirController@LoadDataTA');
    Route::get('/get-ta/{id}','Akademik\TugasAkhirController@get');


    //Fasilitas
    Route::prefix('fasilitas')->group(function () {
      Route::get('/', 'PageController@Fasilitas');
      Route::post('/', 'Fasilitas\FasilitasController@store');
      Route::get('data', 'Fasilitas\FasilitasController@index');
      Route::get('datatable', 'Fasilitas\FasilitasController@loadTable');
      Route::get('edit/{id}', 'Fasilitas\FasilitasController@edit');
      Route::post('update/{id}', 'Fasilitas\FasilitasController@update');
      Route::get('delete/{id}', 'Fasilitas\FasilitasController@destroy');
    });


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

    Route::prefix('berita')->group(function () {
        Route::get('/', 'PageController@Berita');
        Route::post('/', 'Home\BeritaController@store');
        Route::get('datatable', 'Home\BeritaController@loadTable');
        Route::get('data', 'Home\BeritaController@index');
        Route::get('edit/{id}', 'Home\BeritaController@edit');
        Route::get('delete/{id}', 'Home\BeritaController@destroy');
        Route::post('update/{id}', 'Home\BeritaController@update');
        Route::get('show/{id}', 'Home\BeritaController@show');
    });

    Route::prefix('agenda')->group(function () {
        Route::get('/', 'PageController@Agenda');
        Route::post('/', 'Home\AgendaController@store');
        Route::get('datatable', 'Home\AgendaController@loadTable');
        Route::get('data', 'Home\AgendaController@index');
        Route::get('edit/{id}', 'Home\AgendaController@edit');
        Route::get('delete/{id}', 'Home\AgendaController@destroy');
        Route::post('update/{id}', 'Home\AgendaController@update');
    });

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
        Route::get('show/{id}', 'Home\PengumumanController@show');
    });

    //Kemahasiswaan
    Route::get('/alumni', 'Kemahasiswaan\AlumniController@index');
    Route::post('/admin/tambah-alumni','Kemahasiswaan\AlumniController@store');
    Route::get('/load/table-alumni','Kemahasiswaan\AlumniController@LoadTableAlumni');
    Route::get('/load/data-alumni','Kemahasiswaan\AlumniController@LoadDataAlumni');
    Route::get('/admin/delete-alumni/{id}','Kemahasiswaan\AlumniController@destroy');
    Route::get('/admin/edit-alumni/{id}','Kemahasiswaan\AlumniController@edit');
    Route::POST('/admin/konfirmasi-edit-alumni/{id}','Kemahasiswaan\AlumniController@update');

    //Lomba Seminar
    Route::prefix('lomba-seminar')->group(function () {
      Route::get('/', 'PageController@Lomba');
      Route::post('/', 'Kemahasiswaan\InfoLombaController@store');
      Route::get('data', 'Kemahasiswaan\InfoLombaController@index');
      Route::get('datatable', 'Kemahasiswaan\InfoLombaController@loadTable');
      Route::get('edit/{id}', 'Kemahasiswaan\InfoLombaController@edit');
      Route::post('update/{id}', 'Kemahasiswaan\InfoLombaController@update');
      Route::get('delete/{id}', 'Kemahasiswaan\InfoLombaController@destroy');
    });

    //Kegiatan Prodi
    Route::prefix('kegiatanProdi')->group(function () {
      Route::get('/', 'PageController@KegiatanProdi');
      Route::post('/', 'Kemahasiswaan\KegiatanProdiController@store');
      Route::get('data', 'Kemahasiswaan\KegiatanProdiController@index');
      Route::get('datatable', 'Kemahasiswaan\KegiatanProdiController@loadTable');
      Route::get('edit/{id}', 'Kemahasiswaan\KegiatanProdiController@edit');
      Route::post('update/{id}', 'Kemahasiswaan\KegiatanProdiController@update');
      Route::get('delete/{id}', 'Kemahasiswaan\KegiatanProdiController@destroy');
    });

    Route::get('/lowongan', 'Kemahasiswaan\LowonganController@index');
    Route::post('/admin/tambah-lowongan','Kemahasiswaan\LowonganController@store');
    Route::get('/load/table-lowongan','Kemahasiswaan\LowonganController@LoadTableLowongan');
    Route::get('/load/data-lowongan','Kemahasiswaan\LowonganController@LoadDataLowongan');
    Route::get('/admin/delete-lowongan/{id}','Kemahasiswaan\LowonganController@destroy');
    Route::get('/admin/edit-lowongan/{id}','Kemahasiswaan\LowonganController@edit');
    Route::POST('/admin/konfirmasi-edit-lowongan/{id}','Kemahasiswaan\LowonganController@update');

    //Organisasi Mahasiswa
    Route::prefix('organisasi')->group(function () {
      Route::get('/', 'PageController@Organisasi');
      Route::post('/', 'Kemahasiswaan\OrganisasiMahasiswaController@store');
      Route::get('data', 'Kemahasiswaan\OrganisasiMahasiswaController@index');
      Route::get('datatable', 'Kemahasiswaan\OrganisasiMahasiswaController@loadTable');
      Route::get('edit/{id}', 'Kemahasiswaan\OrganisasiMahasiswaController@edit');
      Route::post('update/{id}', 'Kemahasiswaan\OrganisasiMahasiswaController@update');
      Route::get('delete/{id}', 'Kemahasiswaan\OrganisasiMahasiswaController@destroy');
    });


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
    Route::get('/dosen', 'Profile\DosenController@index');
    Route::get('/load/table-dosen','Profile\DosenController@LoadTableDosen');
    Route::get('/load/data-dosen','Profile\DosenController@LoadDataDosen');
    Route::post('/tambah-dosen','Profile\DosenController@store');
    Route::post('/save-dosen/{id}','Profile\DosenController@update');
    Route::get('/get-dosen/{id}','Profile\DosenController@get');
    Route::get('/delete-dosen/{id}','Profile\DosenController@destroy');


    Route::prefix('prestasi')->group(function () {
      Route::get('/', 'PageController@Prestasi');
      Route::post('/', 'Profile\PrestasiController@store');
      Route::get('get-bk', 'Profile\PrestasiController@getBK');
      Route::get('data', 'Profile\PrestasiController@index');
      Route::get('datatable', 'Profile\PrestasiController@loadTable');
      Route::get('edit/{id}', 'Profile\PrestasiController@edit');
      Route::get('delete/{id}', 'Profile\PrestasiController@destroy');
      Route::post('update/{id}', 'Profile\PrestasiController@update');
    });

    Route::get('/sejarah', 'Profile\SejarahController@index');
    Route::post('/admin/tambah-sejarah','Profile\SejarahController@store');
    Route::get('/load/table-sejarah','Profile\SejarahController@LoadTableKonten');
    Route::get('/load/data-sejarah','Profile\SejarahController@LoadDataKonten');
    Route::get('/admin/delete-sejarah/{id}','Profile\SejarahController@destroy');
    Route::get('/admin/edit-sejarah/{id}','Profile\SejarahController@edit');
    Route::POST('/admin/konfirmasi-edit-sejarah/{id}','Profile\SejarahController@update');

    Route::get('/struktur', 'Profile\StrukturOrganisasiController@index');
    Route::post('/admin/tambah-struktur-organisasi', 'Profile\StrukturOrganisasiController@store');
    Route::post('/admin/edit-struktur-organisasi/{id}', 'Profile\StrukturOrganisasiController@update');
    Route::get('/admin/delete-struktur-organisasi/{id}', 'Profile\StrukturOrganisasiController@destroy');
    Route::get('/load/table-so','Profile\StrukturOrganisasiController@LoadTableSO');
    Route::get('/load/data-so','Profile\StrukturOrganisasiController@LoadDataSO');
    Route::get('/get-data-so/{id}','Profile\StrukturOrganisasiController@get');

    Route::get('/visimisi', 'Profile\VisimisiController@index');
    Route::post('/admin/tambah-visimisi','Profile\VisimisiController@store');
    Route::get('/load/table-visimisi','Profile\VisimisiController@LoadTableKonten');
    Route::get('/load/data-visimisi','Profile\VisimisiController@LoadDataKonten');
    Route::get('/admin/delete-visimisi/{id}','Profile\VisimisiController@destroy');
    Route::get('/admin/edit-visimisi/{id}','Profile\VisimisiController@edit');
    Route::POST('/admin/konfirmasi-edit-visimisi/{id}','Profile\VisimisiController@update');

    Route::prefix('tenaga')->group(function () {
      Route::get('/', 'PageController@Tenaga');
      Route::post('/', 'Profile\TenagaKependidikanController@store');
      Route::get('jabatan', 'Profile\TenagaKependidikanController@getJabatan');
      Route::get('data', 'Profile\TenagaKependidikanController@index');
      Route::get('datatable', 'Profile\TenagaKependidikanController@loadTable');
      Route::get('edit/{id}', 'Profile\TenagaKependidikanController@edit');
      Route::get('delete/{id}', 'Profile\TenagaKependidikanController@destroy');
      Route::post('update/{id}', 'Profile\TenagaKependidikanController@update');
    });


    //Riset
    //Penelitian
    Route::prefix('penelitian')->group(function () {
      Route::get('/', 'PageController@Penelitian');
      Route::post('/', 'Riset\PenelitianController@store');
      Route::get('data', 'Riset\PenelitianController@index');
      Route::get('datatable', 'Riset\PenelitianController@loadTable');
      Route::get('edit/{id}', 'Riset\PenelitianController@edit');
      Route::post('update/{id}', 'Riset\PenelitianController@update');
      Route::get('delete/{id}', 'Riset\PenelitianController@destroy');
    });

    //Pengabdian
    Route::prefix('pengabdian')->group(function () {
      Route::get('/', 'PageController@Pengabdian');
      Route::post('/', 'Riset\PengabdianController@store');
      Route::get('data', 'Riset\PengabdianController@index');
      Route::get('datatable', 'Riset\PengabdianController@loadTable');
      Route::get('edit/{id}', 'Riset\PengabdianController@edit');
      Route::post('update/{id}', 'Riset\PengabdianController@update');
      Route::get('delete/{id}', 'Riset\PengabdianController@destroy');
    });

});

Auth::routes();
