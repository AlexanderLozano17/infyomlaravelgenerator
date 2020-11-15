<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Operation
 * @package App\Models
 * @version November 14, 2020, 8:03 pm UTC
 *
 * @property string $operation
 * @property string $description
 */
class Operation extends Model
{
    use SoftDeletes;

    public $table = 'operations';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'operation',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'operation' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'operation' => 'required|min:5|max:50',
        'description' => 'required'
    ];

    
}
