<?php

namespace App\Repositories;

use App\Models\Person;
use App\Repositories\BaseRepository;

/**
 * Class PersonRepository
 * @package App\Repositories
 * @version November 11, 2020, 11:24 pm UTC
*/

class PersonRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Person::class;
    }
}
