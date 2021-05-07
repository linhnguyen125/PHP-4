<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
    protected $fillable = ['bill_code', 'user_id', 'num', 'total'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
