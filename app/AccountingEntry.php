<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountingEntry extends Model
{
  protected $table="accounting_entry";
  protected $casts = ['id' => 'string','reference_id'=>'string'];
  protected $fillable=['id','dept','reference_id','purporse','remark'];

  public function records(){
    return $this->hasMany('App\AccountingRecord', 'batch_id', 'id');
  }
}
