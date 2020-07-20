<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal_kuliah extends Model
{
    protected $table = "jadwal_kuliah";
    protected $guarded =[];

    public function bidangKeahlian()
    {
        return $this->belongsToMany('App\Bidang_keahlian', 'jadwal_bidang', 'kode_bidang', 'kode_jadwal');
    }
    
}
