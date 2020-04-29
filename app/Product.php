<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table="product";
  protected $casts = ['id' => 'string'];
  protected $fillable=['id','name'];

  public function components(){
    return $this->hasMany('App\ProductBomComponent', 'product_id', 'id');
  }

  public function storages(){
    return $this->hasMany('App\StorageItem', 'product_id', 'id');
  }

  public function processes(){
    return $this->hasMany('App\ProductProcess', 'product_id', 'id');
  }
}
