<?php

namespace App\Entities;

use App\Entities\Role;
use App\Entities\City;
use App\Entities\District;
use App\Entities\Ward;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class User.
 *
 * @package namespace App\Entities;
 */
class User extends Authenticatable  implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
        protected $fillable = [
        'name',
        'email',
        'password',
        'age',
        'address',
        'phone',
        'ward_id',
        'district_id',
        'gender',
        'city_id',
        'postal_code',
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
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class, 'ward_id', 'id');
    }

}
