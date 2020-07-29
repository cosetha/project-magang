<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal_kuliah extends Model
{
    protected $table = "jadwal_kuliah";
    protected $guarded =[];

    public function bidangKeahlian()
    {
        return $this->hasOne('App\Bidang_keahlian', 'kode_bk');
    }

    public function semester()
    {
        return $this->hasMany('App\Semester', 'kode_semester');
    }
    
}
