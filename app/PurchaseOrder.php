<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $table="purchase_order";
    protected $casts = ['id' => 'string','manufacture_id' => 'string'];
    protected $fillable=['id','manufacture_id','vendor_id','deliver_to','payment_method'];

    public function items(){
      return $this->hasMany('App\PurchaseItem', 'order_id', 'id');
    }

    public function stockmoves(){
      return $this->hasMany('App\StockMove', 'reference_id', 'id');
    }

    public function accountingrecords(){
      return $this->hasMany('App\AccountingRecord', 'batch_id', 'id');
    }
}
