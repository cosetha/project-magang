<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
  protected $table = ['semester'];
  protected $guarded = ['id'];

  public function semester()
  {
    return $this->belongsTo(KalenderAkademik::class);
  }
}
