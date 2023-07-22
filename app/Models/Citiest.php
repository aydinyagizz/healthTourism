<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citiest extends Model
{
    use HasFactory;

    protected $table = 'cities';

    public function diseases()
    {
        return $this->belongsToMany(Disease::class);
    }
}
