<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminUserStatus extends Model
{
    use HasFactory;

    protected $table = 'admin_user_statuses';

    protected $fillable = [
       // Add frontend_offer_id to the fillable fields
        'user_id',
        'status',
    ];
}
