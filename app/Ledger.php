<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
  protected $table="general_ledger";
  protected $fillable=['id','name','parent'];
}
