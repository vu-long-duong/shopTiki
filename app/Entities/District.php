<?php

namespace App\Entities;

use App\Entities\User;
use App\Entities\City;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class City.
 *
 * @package namespace App\Entities;
 */
class District extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'city_id',
    ];
    public $timestamps = false;

    public function ward()
    {
        return $this->hasMany(District::class, 'district_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'district_id', 'id');
    }


}
