<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
  protected $table="stock_storage";
  protected $casts = ['id' => 'string'];
  protected $fillable=['id','name'];

  public function items(){
    return $this->hasMany('App\StorageItem', 'storage_id', 'id');
  }
}
