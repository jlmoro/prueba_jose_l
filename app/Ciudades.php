<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudades extends Model
{
  protected $table = 'ciudad';
  protected $primaryKey = 'id';
  protected $guarded = [];
}
