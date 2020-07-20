<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Headline extends Model
{
    protected $table = "headlines";
    protected $guarded = ['id'];
}
