<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

/**
 * Class Car
 * @package App\Models
 * @version November 13, 2020, 4:43 am UTC
 *
 * @property \App\Models\Car $owner
 * @property string $brand
 * @property string $color
 * @property string $cylinder
 * @property string $doors
 */
class Car extends Model
{
    use SoftDeletes;

    public $table = 'cars';
    

    protected $dates = ['deleted_at'];


    protected $primaryKey = 'id';

    public $fillable = [
        'id',
        'owner_id',
        'brand',
        'color',
        'cylinder',
        'doors'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'owner_id' => 'integer',
        'brand' => 'string',
        'color' => 'string',
        'cylinder' => 'string',
        'doors' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'brand' => 'required|min:5|max:50',
        'color' => 'required',
        'cylinder' => 'required',
        'doors' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function owner()
    {
        return $this->belongsTo(Person::class, 'owner_id', 'id');
    }
}
