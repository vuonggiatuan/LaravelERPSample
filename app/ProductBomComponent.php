<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductBomComponent extends Model
{
  protected $table="product_bom_component";
  protected $casts = ['id' => 'string'];
  protected $fillable=['id','product_id','material_id','name','quantity','unit'];
}
