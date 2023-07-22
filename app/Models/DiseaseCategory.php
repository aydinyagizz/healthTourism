<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiseaseCategory extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'disease_categories';

    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];

    }
}
