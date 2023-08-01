<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOfferStatus extends Model
{
    use HasFactory;
    protected $table = 'user_offer_statuses';

    protected $fillable = [
        'frontend_offer_id', // Add frontend_offer_id to the fillable fields
        'user_id',
        'status',
    ];



//    public function user()
//    {
//        return $this->belongsTo(User::class);
//    }
//
//    public function isChecked($status)
//    {
//        return $this->status === $status ? 'checked' : '';
//    }
//
//    public function frontendOffer()
//    {
//        return $this->belongsTo(FrontendOffer::class, 'frontend_offer_id');
//    }
}
