<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CarOperation
 * @package App\Models
 * @version November 15, 2020, 4:24 am UTC
 *
 * @property \App\Models\CarOperations $car
 * @property \App\Models\CarOperations $operation
 */
class CarOperation extends Model
{
    use SoftDeletes;

    public $table = 'car_operations';
    

    protected $dates = ['deleted_at'];


    protected $primaryKey = 'id';

    public $fillable = [
        'id',
        'car_id',
        'operation_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'car_id' => 'integer',
        'operation_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'car_id' => 'required',
        'operation_id' => 'required'
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
    public function operation()
    {
        return $this->belongsTo(Operation::class, 'operation_id', 'id');
    }
}
