<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KalenderAkademik extends Model
{
  protected $table = 'kalender_akademik';
  protected $guarded = ['id'];

  public function semester()
  {
    return $this->hasMany(Semester::class);
  }
}
