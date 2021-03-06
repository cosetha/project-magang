<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidang_keahlian extends Model
{
    protected $table = "bidang_keahlian";

    public function jadwal()
    {
        return $this->belongsToMany('App\Jadwal_kuliah', 'jadwal_bidang', 'kode_bidang', 'kode_jadwal');

    }
    public function prestasi()
    {
        return $this->belongsToMany('App\Prestasi', 'bidang_prestasi', 'kode_bidang', 'kode_prestasi');
    }
    public function mahasiswa()
    {
    	return $this->hasMany('App\Mahasiswa');
    }
    public function alumni()
    {
    	return $this->hasMany('App\Alumni');
    }
}
