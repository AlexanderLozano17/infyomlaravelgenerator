<?php

namespace App\Repositories;

use App\Models\CarDrive;
use App\Repositories\BaseRepository;

/**
 * Class CarDriveRepository
 * @package App\Repositories
 * @version November 14, 2020, 8:32 pm UTC
*/

class CarDriveRepository extends BaseRepository
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
        return CarDrive::class;
    }

    public function getDataCarDriver($id)
    {
        return CarDrive::with('car', 'driver')->find($id);
    }
}
