<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis_lowongan extends Model
{
    protected $table = "jenis_lowongan";
    protected $guarded =['id'];

    public function lowongan()
    {
        return $this->hasMany('App\Lowongan');
    }
}
