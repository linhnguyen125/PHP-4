<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Room extends Model
{
    //
    use Sluggable;
    
    protected $fillable = [
        'room_code', 'cat_id', 'status', 'detail', 'slug',
    ];

    public function category(){
        return $this->belongsTo('App\Models\Category');
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
