<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StorageItem extends Model
{
  protected $table="stock_item";
  protected $casts = ['id' => 'string'];
  protected $fillable=['id','product_id','storage_id','quantity','price','unit'];
}
