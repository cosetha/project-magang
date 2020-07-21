<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
  protected $table = ['berita'];
  protected $guarded = ['id'];

  public function tenagaKependidikan()
  {
    return $this->hasMany(TenagaKependidikan::class);
  }

}
