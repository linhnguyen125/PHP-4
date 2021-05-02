<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    //
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'address', 'date_of_birth',
    ];
}
