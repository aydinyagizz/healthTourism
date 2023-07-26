<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citiest extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'cities';

    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];

    }


    public function diseases()
    {
        return $this->belongsToMany(Disease::class);
    }
}
