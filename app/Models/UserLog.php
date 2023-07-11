<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class UserLog extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'ip_address', 'user_agent'];

    protected $table = 'user_logs';

    public function getLastLoginAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
