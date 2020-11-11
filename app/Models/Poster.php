<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Poster
 * @package App\Models
 * @version November 11, 2020, 1:01 am UTC
 *
 * @property string $title
 * @property string $body
 * @property integer $state
 */
class Poster extends Model
{
    use SoftDeletes;

    public $table = 'posters';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'body',
        'state'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'body' => 'string',
        'state' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|min:2|max:500',
        'body' => 'required|min:2|max:255',
        'state' => 'required'
    ];

    
}
