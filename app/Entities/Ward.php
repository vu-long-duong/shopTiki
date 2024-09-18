<?php

namespace App\Entities;

use App\Entities\User;
use App\Entities\District;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Ward.
 *
 * @package namespace App\Entities;
 */
class Ward extends Model implements Transformable
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
        'district_id',
    ];
    public $timestamps = false;

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'ward_id', 'id');
    }


}
