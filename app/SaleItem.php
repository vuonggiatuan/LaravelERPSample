<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
  protected $table="sale_item";
  protected $casts = ['id' => 'string'];
  protected $fillable=['id','order_id','product_id','name','unit','quantity','price','subtotal'];
}
