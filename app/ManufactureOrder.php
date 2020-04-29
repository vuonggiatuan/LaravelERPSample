<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManufactureOrder extends Model
{
  protected $table="manufacture_order";
  protected $casts = ['id' => 'string'];
  protected $fillable=['id','product_id','quantity','dept','scheduled_date','status','material_budget'];

  public function items(){
    return $this->hasMany('App\ManufactureOrderItem', 'order_id', 'id');
  }
  public function stockmoves(){
    return $this->hasMany('App\StockMove', 'reference_id', 'id');
  }

  public function processes(){
    return $this->hasMany('App\ManufactureProcess', 'order_id', 'id');
  }

  public function accountingrecords(){
    return $this->hasMany('App\AccountingRecord', 'batch_id', 'id');
  }
}
