<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $table = "alumni";
    protected $guarded = ['id'];
    
    public function bidangKeahlian()
    {
        return $this->hasMany('App\Bidang_keahlian', 'id', 'kode_bk');
    }
}
