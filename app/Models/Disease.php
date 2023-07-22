<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'diseases';

    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];

    }

    public function cities()
    {
       // return $this->belongsToMany(Citiest::class);
        return $this->belongsToMany(Citiest::class, 'citiest_disease', 'disease_id', 'citiest_id');
    }
}
