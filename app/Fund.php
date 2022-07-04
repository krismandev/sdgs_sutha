<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    protected $guarded = [];

    public function Donatur()
    {
        $this->belongsTo(Donatur::class,'fund_id','id');
    }
}
