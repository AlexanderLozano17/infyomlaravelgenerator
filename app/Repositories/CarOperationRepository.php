<?php

namespace App\Repositories;

use App\Models\CarOperation;
use App\Repositories\BaseRepository;

/**
 * Class CarOperationRepository
 * @package App\Repositories
 * @version November 15, 2020, 4:24 am UTC
*/

class CarOperationRepository extends BaseRepository
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
        return CarOperation::class;
    }
}
