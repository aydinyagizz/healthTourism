<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Sluggable, HasRoles, HasPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_role',
        'status',
        'featured',
        'agency_name',
        'company_name',
        'phone',
        'city',
        'address',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function sluggable():array
    {
        return [
            'slug' => [
//                'source' => 'web_site_name'
                'source' => 'name'
            ]
        ];

    }

    public function logs()
    {
        return $this->hasMany(UserLog::class);
    }

    public function adminUserStatuses()
    {
        return $this->belongsToMany(User::class, 'admin_user_statuses',  'user_id')
            ->withPivot('status');
    }

    public function getOfferCountAttribute()
    {
        return FrontendOffer::where('service_city', $this->city)->count();
    }


//    public function userOfferStatuses()
//    {
//        return $this->hasMany(UserOfferStatus::class, 'user_id');
//    }
}
