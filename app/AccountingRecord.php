<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountingRecord extends Model
{
    protected $table="accounting_record";
    protected $casts = ['id' => 'string','batch_id'=>'string'];
    protected $fillable=['id','batch_id','content','asset','liability','amount'];
}
