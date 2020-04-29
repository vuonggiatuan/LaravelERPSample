<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LedgerBudget extends Model
{
  protected $table="general_ledger_budget";
  protected $casts = ['id' => 'string'];
  protected $fillable=['id','ledger_id','year','budget'];
}
