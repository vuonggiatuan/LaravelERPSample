<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManufactureOrderItem extends Model
{
  protected $table="manufacture_order_item";
  protected $casts = ['id' => 'string'];
  protected $fillable=['id','order_id','material_id','name','scheduled_quantity','consumed_quantity','unit'];
}
