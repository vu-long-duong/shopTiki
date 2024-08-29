<?php

namespace App\Entities;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class User.
 *
 * @package namespace App\Entities;
 */
class User extends Model implements Transformable
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
        'phone',
        'ward',
        'district',
        'gender',
        'city',
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
        return $this->belongsTo(Role::class, 'role_id');
    }

}
