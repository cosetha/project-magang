<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $table = "prestasi";
    protected $guarded = ['id'];

    public function bidangKeahlian()
    {
    	return $this->belongsToMany('App\Bidang_keahlian', 'bidang_prestasi', 'kode_bidang', 'kode_prestasi');
    }
}
