<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;

class User extends Authenticatable
{
    const DEACTIVE = 0;
    const ACTIVE = 1;
    const SUPER_ADMIN_ROLE = 0;
    const ADMIN_ROLE = 1;
    const USER_ROLE = 2;
    const DEFAULT_PASSWORD = 12345678;

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'age',
        'phone',
        'ward',
        'district',
        'city',
        'postal',
        'country',
        'date_of_birth',
        'profile_picture',
        'google_id',
        'facebook_id',
        'provider',
        'provider_token',
        'avatar',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }


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
        'password' => 'hashed',
    ];
}
