<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockMove extends Model
{
    protected $table="stock_move";
    protected $casts = ['id' => 'string','product_id' => 'string','reference_id' => 'string'];
    protected $fillable=['id','reference_id','product_id','name','quantity','price','source','destination','type','expected_date'];
}
