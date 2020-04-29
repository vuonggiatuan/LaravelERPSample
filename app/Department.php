<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
  protected $table="department";
  protected $casts = ['id' => 'string'];
  protected $fillable=['id','name','region','function','account','allowance'];
}