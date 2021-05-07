<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Room extends Model
{
    //
    use Sluggable;
    
    protected $fillable = [
        'room_code', 'category_id', 'status', 'detail', 'slug','image', 'price',
    ];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function bills(){
        return $this->hasMany('App\Models\BillDetail');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
