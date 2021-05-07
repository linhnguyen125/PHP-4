<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'name', 'description','slug',
    ];

    public function rooms(){
        return $this->hasMany('App\Models\Room');
    }
}
