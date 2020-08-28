<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
  protected $table = 'berita';
  protected $guarded = ['id'];

    public function user()
    {
      // return $this->belongsTo(User::class);
      return $this->belongsTo('App\User', 'id');
    }
}
