<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
  public $table = "jabatan";
  protected $guarded = ['id'];

  public function tenagaKependidikan()
  {
    return $this->hasMany(TenagaKependidikan::class);
  }

}
