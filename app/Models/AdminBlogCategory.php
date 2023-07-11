<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminBlogCategory extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'admin_blog_categories';

    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];

    }


}
