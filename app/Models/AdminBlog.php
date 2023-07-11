<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminBlog extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'admin_blogs';

    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];

    }

}
