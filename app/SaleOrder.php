<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleOrder extends Model
{
  protected $table="sale_order";
  protected $casts = ['id' => 'string'];
  protected $fillable=['id','date','warehouse','customer_id','customer_name','customer_tel','customer_add','invoice','status'];

  public function items(){
    return $this->hasMany('App\SaleItem', 'order_id', 'id');
  }

  public function stockmoves(){
    return $this->hasMany('App\StockMove', 'reference_id', 'id');
  }

  public function accountingrecords(){
    return $this->hasMany('App\AccountingRecord', 'batch_id', 'id');
  }
}
