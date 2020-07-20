<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $table = "alumni";
    protected $guarded = ['id'];
    
    public function prestasi()
    {
    	return $this->belongsTo('App\Bidang_keahlian');
    }
}
