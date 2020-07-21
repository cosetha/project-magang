<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    protected $table = "jenis_lowongan";
    protected $guarded =['id'];

    public function bidangKeahlian()
    {
        return $this->hasMany('App\Jenis_lowongan');
    }
}
