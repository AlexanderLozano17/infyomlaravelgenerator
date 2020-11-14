<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

/**
 * Class Person
 * @package App\Models
 * @version November 11, 2020, 11:24 pm UTC
 *
 * @property string $identification
 * @property string $email
 * @property string $first_name
 * @property string $second_name
 * @property string $last_name
 * @property string $age
 */
class Person extends Model
{
    use SoftDeletes;

    public $table = 'people';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'identification',
        'email',
        'first_name',
        'second_name',
        'last_name',
        'age'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'identification' => 'string',
        'email' => 'string',
        'first_name' => 'string',
        'second_name' => 'string',
        'last_name' => 'string',
        'age' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'identification' => 'required|min:5|max:10',
        'email' => 'required',
        'first_name' => 'required|min:5|max:30',
        'second_name' => 'required|min:5|max:30',
        'last_name' => 'required|min:5|max:50',
        'age' => 'required|min:1|max:3'
    ];

    public function getDataPerson() {

        return Person::select('id' ,'identification' ,'email' ,DB::raw("CONCAT(first_name,' ',second_name,' ',last_name) as name") ,'age')->get();
    }
    
}
