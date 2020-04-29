<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
  protected $table="purchase_item";
  protected $casts = ['id' => 'string','order_id'=>'string','product_id' => 'string'];
  protected $fillable=['id','order_id','product_id','name','quantity','price','subtotal'];
}
