<?php

namespace App\Repositories;

use App\Models\Car;
use App\Repositories\BaseRepository;

/**
 * Class CarRepository
 * @package App\Repositories
 * @version November 13, 2020, 4:43 am UTC
*/

class CarRepository extends BaseRepository
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
        return Car::class;
    }
}
