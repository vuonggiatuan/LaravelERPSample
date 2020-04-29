<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductProcess extends Model
{
  protected $table="product_process";
  protected $casts = ['id' => 'string'];
  protected $fillable=['id','product_id','name','percent'];
}
