<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrontendOffer extends Model
{
    use HasFactory;

    protected $table = 'frontend_offers';

    public function userOfferStatuses()
    {
        return $this->belongsToMany(User::class, 'user_offer_statuses', 'frontend_offer_id', 'user_id')
            ->withPivot('status');
    }
}
