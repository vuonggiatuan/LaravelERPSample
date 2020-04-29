<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManufactureProcess extends Model
{
  protected $table="manufacture_process";
  protected $casts = ['id' => 'string'];
  protected $fillable=['id','order_id','name','manufacture_cost','labor_cost'];
}
