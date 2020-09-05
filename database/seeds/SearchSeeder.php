<?php

use Illuminate\Database\Seeder;
use App\SearchMenu;

class SearchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = [
            [
	            'menu' => 'Agenda',
	            'url' => '/agenda'
        	],
        	[
	            'menu' => 'Akreditasi',
	            'url' => '/akreditasi'
        	],
        	[
	            'menu' => 'Berita',
	            'url' => '/berita'
        	],
        	[
	            'menu' => 'Bidang Keahlian',
	            'url' => '/bk'
        	],
        	[
	            'menu' => 'Blog',
	            'url' => '/blog'
        	],
        	[
	            'menu' => 'Dashboard',
	            'url' => '/dashboard'
        	],
        	[
	            'menu' => 'Data Alumni',
	            'url' => '/alumni'
        	],
        	[
	            'menu' => 'Data Pengguna',
	            'url' => '/datapengguna'
        	],
        	[
	            'menu' => 'Dokumen',
	            'url' => '/dokumen'
        	],
        	[
	            'menu' => 'Dosen',
	            'url' => '/dosen'
        	],
        	[
	            'menu' => 'Edit Password',
	            'url' => '/editpassword'
        	],
        	[
	            'menu' => 'Edit Profile',
	            'url' => '/editprofile'
        	],
        	[
	            'menu' => 'Fasilitas',
	            'url' => '/fasilitas'
        	],
        	[
	            'menu' => 'FAQ',
	            'url' => '/faq'
        	],
        	[
	            'menu' => 'Form',
	            'url' => '/form'
        	],
        	[
	            'menu' => 'Headline',
	            'url' => '/headline'
        	],
        	[
	            'menu' => 'Info Lomba / Seminar',
	            'url' => '/lomba-seminar'
        	],
        	[
	            'menu' => 'Jabatan',
	            'url' => '/jabatan'
        	],
        	[
	            'menu' => 'Jadwal Kuliah',
	            'url' => '/jadwal'
        	],
        	[
	            'menu' => 'Kalender Akademik',
	            'url' => '/kalender'
        	],
        	[
	            'menu' => 'Kegiatan Akademik',
	            'url' => '/kegiatan'
        	],
        	[
	            'menu' => 'Kegiatan Prodi ',
	            'url' => '/kegiatanProdi'
        	],
        	[
	            'menu' => 'Kerja Sama',
	            'url' => '/kerjasama'
        	],
        	[
	            'menu' => 'Layanan UB ',
	            'url' => '/layanan'
        	],
        	[
	            'menu' => 'Lowongan',
	            'url' => '/lowongan'
        	],
        	[
	            'menu' => 'Mahasiswa',
	            'url' => '/mahasiswa'
        	],
        	[
	            'menu' => 'OJT',
	            'url' => '/ojt'
        	],
        	[
	            'menu' => 'Organisasi',
	            'url' => '/organisasi'
        	],
        	[
	            'menu' => 'Penelitian',
	            'url' => '/penelitian'
        	],
        	[
	            'menu' => 'Pengabdian',
	            'url' => '/pengabdian'
        	],
        	[
	            'menu' => 'Pengumuman',
	            'url' => '/pengumuman'
        	],
        	[
	            'menu' => 'Prestasi',
	            'url' => '/prestasi'
        	],
        	[
	            'menu' => 'Quick Menu',
	            'url' => '/quick-menu'
        	],
        	[
	            'menu' => 'Sejarah',
	            'url' => '/sejarah'
        	],
        	[
	            'menu' => 'Semester',
	            'url' => '/semester'
        	],
        	[
	            'menu' => 'Social Media',
	            'url' => '/sosmed'
        	],
        	[
	            'menu' => 'Struktur Organisasi',
	            'url' => '/struktur'
        	],
        	[
	            'menu' => 'Tenaga Kerja',
	            'url' => '/tenaga'
        	],
        	[
	            'menu' => 'Tugas Akhir',
	            'url' => '/tugasakhir'
        	],
        	[
	            'menu' => 'Visi dan Misi',
	            'url' => '/visimisi'
        	]		
        ];

        foreach ($menu as $m) {
            SearchMenu::create($m);
        }
    }
}
