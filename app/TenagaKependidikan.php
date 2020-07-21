<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TenagaKependidikan extends Model
{
  protected $table = ['tenaga_kependidikan'];
  protected $guarded = ['id'];

  public function jabatan()
  {
    return $this->belongsTo(Jabatan::class);
  }
}
