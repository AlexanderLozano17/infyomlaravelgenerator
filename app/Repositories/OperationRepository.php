<?php

namespace App\Repositories;

use App\Models\Operation;
use App\Repositories\BaseRepository;

/**
 * Class OperationRepository
 * @package App\Repositories
 * @version November 14, 2020, 8:03 pm UTC
*/

class OperationRepository extends BaseRepository
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
        return Operation::class;
    }
}
