<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CarDrive
 * @package App\Models
 * @version November 14, 2020, 8:32 pm UTC
 *
 * @property \App\Models\CarDrive $car
 * @property \App\Models\CarDrive $driver
 * @property string $status
 */
class CarDrive extends Model
{
    use SoftDeletes;

    public $table = 'car_drives';
    

    protected $dates = ['deleted_at'];


    protected $primaryKey = 'id';

    public $fillable = [
        'id',
        'status',
        'car_id',
        'driver_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'car_id' => 'integer',
        'driver_id' => 'integer',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'car_id' => 'required',
        'driver_id' => 'required',
        'status' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function driver()
    {
        return $this->belongsTo(Person::class, 'driver_id', 'id');
    }
}
