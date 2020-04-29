<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $table="customer";
  protected $casts = ['id' => 'string'];
  protected $fillable=['id','name'];
}
