<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = "dosen";
    protected $guarded = ['id'];

    public function bidangKeahlian()
    {
    	return $this->belongsToMany('App\Bidang_keahlian', 'bidang_dosen', 'kode_bidang', 'kode_dosen');
    }
}
